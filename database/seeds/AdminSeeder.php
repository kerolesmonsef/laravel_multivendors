<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Admin\Entities\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([

        ]);
        $user = User::create([
            'profile_type' => Admin::class,
            'profile_id' => $admin->id,
            'active' => 'yes',
            'name' => "Keroles",
            'email' => "kerolesmonsef@gmail.com",
            'mobile' => "01283984098",
            'password' => bcrypt("12345678"),
            'photo' => random_image_url(),
        ]);
    }
}
