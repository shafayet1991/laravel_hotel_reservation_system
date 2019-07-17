<?php

use App\Models\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('payment_types')->truncate();
        DB::table('payment_types')->insert([
            ['name' => 'Acentada Ödeme', 'method' => 'agency_payment'],
            ['name' => 'Banka Havalesi İle Ödeme', 'method' => 'transfer_payment'],
            ['name' => 'Kredi Kartı İle Ödeme', 'method' => 'card_payment'],
            ['name' => 'Otelde Ödeme', 'method' => 'hotel_payment'],
            ['name' => 'Mail Order', 'method' => 'mail_payment'],
        ]);
    }
}
