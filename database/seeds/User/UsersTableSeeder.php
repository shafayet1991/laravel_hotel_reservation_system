<?php

use App\Models\System\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Ümit UZ','email' => "umituz998@gmail.com", 'password' => bcrypt(159538)],
            ['name' => 'Serkan Boztepe','email' => "serkanboztepe02@gmail.com", 'password' => bcrypt(123456)],
            ['name' => 'Serkan Boztepe','email' => "admin@example.com", 'password' => bcrypt(123456)],
            ]);

        $total = User::count();
        $this->command->info( __CLASS__." başarıyla oluşturuldu. Toplam {$total} veri eklendi.");
    }
}
