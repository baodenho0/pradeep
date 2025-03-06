<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MainMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            ['slug' => 'home', 'url' => '/home', 'parent_id' => null, 'position' => 1, 'name_en' => 'Home', 'name_np' => 'गृह'],
            ['slug' => 'about', 'url' => '/about', 'parent_id' => null, 'position' => 2, 'name_en' => 'About', 'name_np' => 'बारेमा'],
            ['slug' => 'company-profile', 'url' => '/about/company-profile', 'parent_id' => 2, 'position' => 1, 'name_en' => 'Company Profile', 'name_np' => 'कम्पनी प्रोफाइल'],
            ['slug' => 'branches-list', 'url' => '/about/branches-list', 'parent_id' => 2, 'position' => 2, 'name_en' => 'Branches List', 'name_np' => 'शाखा सूची'],
            ['slug' => 'our-staff', 'url' => '/about/our-staff', 'parent_id' => 2, 'position' => 3, 'name_en' => 'Our Staff', 'name_np' => 'हाम्रो स्टाफ'],
            ['slug' => 'testimonials', 'url' => '/about/testimonials', 'parent_id' => 2, 'position' => 4, 'name_en' => 'Testimonials', 'name_np' => 'प्रशंसापत्र'],
            ['slug' => 'services', 'url' => '/services', 'parent_id' => null, 'position' => 3, 'name_en' => 'Services', 'name_np' => 'सेवाहरू'],
            ['slug' => 'products', 'url' => '/products', 'parent_id' => null, 'position' => 4, 'name_en' => 'Products', 'name_np' => 'उत्पादनहरू'],
            ['slug' => 'news', 'url' => '/news', 'parent_id' => null, 'position' => 5, 'name_en' => 'News', 'name_np' => 'समाचार'],
        ]);
    }
}
