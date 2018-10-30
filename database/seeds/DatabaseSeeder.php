<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(categorySeeder::class);
        $this->call(PermissionTableSeeder::class);
    }
}
class adminSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'admin',
                'Password' => bcrypt('123456'),
                'email' => 'admin@gmail.com',
                'address' => 'Hà Nội',
                'phone' => '01218858822',
                'status' => 1,
            ]
        );
    }
}

class categorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Dự Án', 'parent_id' => 0, 'slug' => 'du-an', 'status' => 1],
            ['name' => 'Mua Bán', 'parent_id' => 0, 'slug' => 'mua-ban', 'status' => 1],
            ['name' => 'Cho Thuê', 'parent_id' => 0, 'slug' => 'cho-thue', 'status' => 1],
            ['name' => 'Thiết Kế Nội Thất', 'parent_id' => 0, 'slug' => 'thiet-ke-noi-that', 'status' => 1],
            ['name' => 'Môi Giới', 'parent_id' => 0, 'slug' => 'du-an', 'status' => 1],
            ['name' => 'Căn Hộ', 'parent_id' => 1, 'slug' => 'can-ho', 'status' => 1],
            ['name' => 'Nhà Mặt Phố', 'parent_id' => 1, 'slug' => 'nha-mat-pho', 'status' => 1],
            ['name' => 'Biệt Thự Liền Kề', 'parent_id' => 1, 'slug' => 'biet-thu-lien-ke', 'status' => 1],
            ['name' => 'Đất Xây Dựng', 'parent_id' => 1, 'slug' => 'dat-xay-dung', 'status' => 1],
            ['name' => 'Văn Phòng', 'parent_id' => 1, 'slug' => 'van-phong', 'status' => 1],
        ]);
    }
}

class conditions extends Seeder
{
    public function run()
    {
        DB::table('conditions')->insert([
            ['name' => 'Beds', 'icon' => '<i class="fa fa-bed" aria-hidden="true"></i>', 'status' => 1],
            ['name' => 'Bathroom', 'icon' => '<i class="fa fa-bath" aria-hidden="true"></i>', 'status' => 1],
            ['name' => 'Garage', 'icon' => '<i class="fa fa-cab" aria-hidden="true"></i>', 'status' => 1],
            ['name' => 'Balcony', 'icon' => '<i class="fa fa-archway"></i>', 'status' => 1],
            ['name' => 'sq ft', 'icon' => '<i class="fa fa-map-o" aria-hidden="true"></i>', 'status' => 1],
            ['name' => 'TV', 'icon' => '<i class="fa fa-desktop" aria-hidden="true"></i>', 'status' => 1],
            ['name' => 'sofa', 'icon' => '<i class="fa fa-couch"></i>', 'status' => 1],
            ['name' => 'elevator', 'icon' => '<i class="fa fa-binoculars" aria-hidden="true"></i>', 'status' => 1],
        ]);
    }
}

class features extends Seeder
{
    public function run()
    {
        DB::table('features')->insert([
            ['name' => 'monitoring', 'icon' => '<i class="fa fa-video-camera" aria-hidden="true"></i>', 'status' => 1],
            ['name' => 'security', 'icon' => '<i class="fa fa-shield" aria-hidden="true"></i>', 'status' => 1],
            ['name' => 'restaurant', 'icon' => '<i class="fa fa-cutlery" aria-hidden="true"></i>', 'status' => 1],
            ['name' => 'University', 'icon' => '<i class="fa fa-graduation-cap" aria-hidden="true"></i>', 'status' => 1],
            ['name' => 'kindergarten', 'icon' => '<i class="fa fa-child" aria-hidden="true"></i>', 'status' => 1],
            ['name' => 'hospital', 'icon' => '<i class="fa fa-hospital-o" aria-hidden="true"></i>', 'status' => 1],
            ['name' => 'Park', 'icon' => '<i class="fa fa-wolf-pack-battalion"></i>', 'status' => 1],
            ['name' => 'Theatre', 'icon' => '<i class="fa fa-theater-masks"></i>', 'status' => 1],
            ['name' => 'coffe', 'icon' => '<i class="fa fa-coffee" aria-hidden="true"></i>', 'status' => 1],
            ['name' => 'sport', 'icon' => '<i class="fa fa-futbol-o" aria-hidden="true"></i>', 'status' => 1],
            ['name' => 'resident card', 'icon' => '<i class="fa fa-address-card-o" aria-hidden="true"></i>', 'status' => 1],
            ['name' => 'supermarket', 'icon' => '<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>', 'status' => 1],
        ]);
    }
}
