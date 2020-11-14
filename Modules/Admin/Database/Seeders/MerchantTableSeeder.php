<?php

namespace Modules\Admin\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Merchant\Entities\Merchant;

class MerchantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        for ($i = 0; $i < 100; $i++) {
            $merchant = factory(Merchant::class)->create();
            factory(User::class)->create([
                'profile_id' => $merchant->id,
                'profile_type' => Merchant::class,
            ]);
        }
    }
}
