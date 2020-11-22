<?php

namespace Modules\Customer\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $first_random_18_product = Product::query()->with("merchant.user")->limit(18)->inRandomOrder()->get();
        $second_random_6_product = Product::query()->with("merchant.user")->limit(6)->inRandomOrder()->get();
        $third_random_6_product = Product::query()->with("merchant.user")->limit(6)->inRandomOrder()->get();
        $forth_random_12_product = Product::query()->with("merchant.user")->limit(12)->inRandomOrder()->get();
//        dd($first_random_18_product->first()->details);
        return view('customer::index', [
            'first_random_18_product' => $first_random_18_product,
            'second_random_6_product' => $second_random_6_product,
            'third_random_6_product' => $third_random_6_product,
            'forth_random_12_product' => $forth_random_12_product,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('customer::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('customer::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('customer::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
