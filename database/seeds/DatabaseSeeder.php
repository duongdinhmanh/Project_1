<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		$this->call(categorySeeder::class);
	}

}

class adminSeeder extends Seeder {
	public function run() {
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

class categorySeeder extends Seeder {
	public function run() {
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
