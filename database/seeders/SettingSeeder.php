<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            ['name' => 'site_title', 'value' => 'Admin Template', 'created_at' => '2020-06-04 23:39:15',],
            ['name' => 'meta_keywords', 'value' => null, 'created_at' => '2020-06-04 23:39:15',],
            ['name' => 'meta_desc', 'value' => null, 'created_at' => '2020-06-04 23:39:15',],
            ['name' => 'favicon', 'value' => '173080537752244224admin-logo-dark.png', 'created_at' => '2020-06-04 23:39:15',],
            ['name' => 'logo', 'value' => '781959855880540736logo-4.png', 'created_at' => '2020-06-04 23:39:15',],
            ['name' => 'admin_logo', 'value' => '16017616301230256152admin-text-dark.png', 'created_at' => '2020-06-04 23:39:15',],
            ['name' => 'email', 'value' => null, 'created_at' => '2020-06-04 23:39:15',],
            ['name' => 'facebook', 'value' => null, 'created_at' => '2020-06-04 23:39:15',],
            ['name' => 'instagram', 'value' => null, 'created_at' => '2020-06-04 23:39:15',],
            ['name' => 'twitter', 'value' => null, 'created_at' => '2020-06-04 23:39:15',],
            ['name' => 'auth_page_heading', 'value' => 'ADMIN PORTAL OF 2019', 'created_at' => '2020-06-04 23:39:15',],
            ['name' => 'auth_page_desc', 'value' => 'with this admin you can get 2000+ pages, 500+ ui component, 2000+ icons, different demos and many more...', 'created_at' => '2020-06-04 23:39:15',],
            ['name' => 'copy_right', 'value' => 'copy_right', 'created_at' => '2020-06-04 23:39:15',],
        ];
        DB::table('settings')->insert($settings);
    }
}
