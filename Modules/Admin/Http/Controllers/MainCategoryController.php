<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Language;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\MainCategory;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Http\Requests\MainCategoryRequest;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
//        DB::enableQueryLog();
        $categories = MainCategory::query()->with(['languages' => function ($query) {
            $query->where("languages.short_cut", '=', get_default_lang());
        }])
            ->paginate(10);
//        dd($categories);

        return view('admin::MainCategory.categories', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::MainCategory.add_main_category');
    }

    /**
     * Show the form for editing the specified resource.
     * @param MainCategory $main_category
     * @return Renderable
     */
    public function edit(MainCategory $main_category)
    {
        return view('admin::MainCategory.edit_main_category', [
            'main_category' => $main_category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return void
     */
    public function store(MainCategoryRequest $request)
    {
        $categories = $request->input('category');
        $categories = collect($categories);
        $photoPath = uploadImage('main_categories', $request->file('photo'));
        /** @var MainCategory $main_category */
        $main_category = MainCategory::create([
            'slug' => request('slug'),
            'photo' => $photoPath,
        ]);
        foreach ($categories as $cat) {
            $main_category->languages()->attach($cat['language_id'], ['content' => $cat['name']]);
        }


        return redirect()->route('admin.main_category.index')->with('s_alert_success', 'Cat Added Successfully');
    }

    /**
     * Update the specified resource in storage.
     * @param MainCategoryRequest $request
     * @param MainCategory $main_category
     * @return void
     */
    public function update(MainCategoryRequest $request, MainCategory $main_category)
    {
        $photo = $main_category->photo;
        if ($request->hasFile('photo')) {
            $photo = uploadImage('main_categories', $request->file('photo'));
        }
//        dd($request->input('category'));
        $main_category->update([
            'slug' => request('slug'),
            'photo' => $photo,
        ]);

        foreach ($request->input('category') as $cat_i) {
            $main_category->languages()->updateExistingPivot($cat_i['language_id'], ['content' => $cat_i['name']]);
        }
        return redirect()->back()->with('s_alert_success', 'Cat Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param MainCategory $main_category
     * @return void
     * @throws \Exception
     */
    public function destroy(MainCategory $main_category)
    {
        $main_category->languages()->detach();
        $main_category->delete();
        return redirect()->route('admin.main_category.index')->with('s_alert_success', 'Cat Deleted Successfully');
    }
}
