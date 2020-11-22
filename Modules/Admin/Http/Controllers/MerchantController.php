<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Modules\Admin\Http\Requests\MerchantCreateUpdateRequest;
use Modules\Admin\Notifications\MerchantCreated;
use Modules\Merchant\Entities\Merchant;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
//        DB::connection()->enableQueryLog();
        $merchants = Merchant::query()
            ->with(['category', 'user', 'category.languages' => function ($query) {
                $query->where("languages.short_cut", '=', get_default_lang());
            }])->orderBy('merchants.id','desc')
            ->paginate(10);
//        dd(DB::connection()->getQueryLog());
        return view('admin::Merchant.merchants', [
            'merchants' => $merchants,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return $this->edit(new Merchant);
    }

    /**
     * Store a newly created resource in storage.
     * @param MerchantCreateUpdateRequest $request
     * @return void
     */
    public function store(MerchantCreateUpdateRequest $request)
    {
        $create = [
            'address' => request('address'),
            'latitude' => request('latitude'),
            'longitude' => request('longitude'),
            'category_id' => request('category_id'),
            'logo' => uploadImage('merchants', request()->file('logo')),
        ];
        /** @var Merchant $merchant */
        $merchant = Merchant::create($create);

        $create_user = [
            'name' => request('name'),
            'email' => request('email'),
            'mobile' => request('mobile'),
            'active' => request('active') == "on" ? "yes" : "no",
            'password' => bcrypt(request('password')),
        ];
        $user = new User($create_user);
        $merchant->user()->save($user);

        Notification::send($user,new MerchantCreated($user));

        return redirect()->back()->with('s_alert_success', 'Merchant Created Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     * @param Merchant $merchant
     * @return Renderable
     */
    public function edit(Merchant $merchant)
    {
        return view('admin::Merchant.add_edit_merchant', [
            'merchant' => $merchant,
            'user' => $merchant->exists ? $merchant->user : new User,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param MerchantCreateUpdateRequest $request
     * @param Merchant $merchant
     * @return void
     */
    public function update(MerchantCreateUpdateRequest $request, Merchant $merchant)
    {
        $update = [
            'address' => request('address'),
            'latitude' => request('latitude'),
            'longitude' => request('longitude'),
            'category_id' => request('category_id'),
        ];
//        dd($request->file("logo"));
        if (request()->hasFile('logo')) {
            $update['logo'] = uploadImage('merchants', request()->file('logo'));
        }
        $merchant->update($update);
        /** @var  $user_update */
        $user = $merchant->user;
        $user_update = [
            'name' => request('name'),
            'email' => request('email'),
            'mobile' => request('mobile'),
            'active' => request('active') == "on" ? "yes" : "no",
            'password' => request('password') ? bcrypt(request('password')) : $user->password,
        ];
        $user->update($user_update);
        return redirect()->back()->with('s_alert_success', 'Merchant Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param Merchant $merchant
     * @return void
     * @throws \Exception
     */
    public function destroy(Merchant $merchant)
    {
        $merchant->user()->delete();
        $merchant->delete();
        return redirect()
            ->route('admin.merchant.index')
            ->with('s_alert_success', 'Merchant Deleted Successfully');
    }
}
