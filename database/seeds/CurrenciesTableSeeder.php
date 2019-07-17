<?php

use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('currencies')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $currencies = [
            ['code' => 'TL','symbol' => '₺','name' => 'Türk Lirası'],
            ['code' => 'USD','symbol' => '$','name' => 'ABD Doları'],
            ['code' => 'EUR','symbol' => '€','name' => 'EURO'],
            ['code' => 'GBP','symbol' => '£','name' => 'İngiliz Sterlini'],
        ];

        foreach ($currencies as $name) {
            Currency::create(
                $name
            );
        }
    }
}
