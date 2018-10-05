<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		$this->call(adminSeeder::class);
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
				'role' => 1,
				'status' => 1,
			]
		);
	}
}
