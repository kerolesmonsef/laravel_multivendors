<?php

use Illuminate\Database\Seeder;
use Modules\Merchant\Entities\Merchant;

class MerchantPaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $save = [];
        foreach (Merchant::all() as $merchant) {
            $save [] = [
                'merchant_id' => $merchant->id,
                'payment_email' => 'sb-ibxgk3322069@business.example.com',
                'payment_key' => 'Aa9JlKuI8NFE3dVcA9RtlC5_6yMJWY7vxAOSiHoceWUprsJ6jFk3WNlloRRzULOLsoMeHIxnhApKkhu6',
                'payment_secret' => 'EKikhTUlDW4cXFaSvQcPvpY5w-_cHydMsAabKHOVUOQ70Y0Dt81ODqFj9rA_7EHP59Vp_pZMhUMbGfnJ',
                'payment_type_id' => '1',
            ];
        }
        $big = new \App\MYMODEL\Helpers\SeedBigData($save, 20, 'merchant_payment_types');
        $big->run();
    }
}
