<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Language;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\AdminAddEditLanguageRequest;

class AdminLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin::Language.languages', ['languages' => $languages]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return $this->edit(new Language);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Language $language
     * @return Renderable
     */
    public function edit(Language $language)
    {
        return view('admin::Language.add_edit_language', [
            'language' => $language
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param AdminAddEditLanguageRequest $request
     * @return Renderable
     */
    public function store(AdminAddEditLanguageRequest $request)
    {
        if ($request->has('active')) {
            $request->merge(['active' => 'yes']);
        } else {
            $request->merge(['active' => 'no']);
        }
        Language::create($request->except(['_token', '_method']));

        return redirect()->route('admin.language.index')->with('s_alert_success', 'Language Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     * @param AdminAddEditLanguageRequest $request
     * @param Language $language
     * @return void
     */
    public function update(AdminAddEditLanguageRequest $request, Language $language)
    {
        if ($request->has('active')) {
            $request->merge(['active' => 'yes']);
        } else {
            $request->merge(['active' => 'no']);
        }
        $language->update($request->except(['_token', '_method']));

        return redirect()->back()->with('s_alert_success', 'Language Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param Language $language
     * @return void
     * @throws \Exception
     */
    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->back()->with('s_alert_success', 'Language Deleted Successfully');
    }
}
