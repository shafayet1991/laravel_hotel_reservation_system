<?php

use App\Models\Setting\SocialMediaSetting;
use Illuminate\Database\Seeder;

class SocialMediaSettingsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('social_media_settings')->insert([
            ['name' => 'Facebook', 'url' => 'https://facebook.com','icon' => 'fab fa-facebook'],
            ['name' => 'Twitter', 'url' => 'https://twitter.com','icon' => 'fab fa-twitter'],
            ['name' => 'Instagram', 'url' => 'https://instagram.com','icon' => 'fab fa-instagram'],
            ['name' => 'Linkedin', 'url' => 'https://linkedin.com','icon' => 'fab fa-linkedin'],
            ['name' => 'Pinterest', 'url' => 'https://pinterest.com','icon' => 'fab fa-pinterest'],
        ]);

        $total = SocialMediaSetting::count();
        $this->command->info( __CLASS__." başarıyla oluşturuldu. Toplam {$total} veri eklendi.");
    }
}
