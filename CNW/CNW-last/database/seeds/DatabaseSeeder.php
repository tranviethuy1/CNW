<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('UserTableSeeder');
    }
}
// Insert bằng seed vì bằng tay không có hash::make and bycypt -> sử dụng Auth::attempt
class UserTableSeeder extends Seeder{
	public function run(){
		DB::table('users')->insert([
			['email'=>'admin@gmail.com','password'=>bcrypt('admin'),'phone'=>'0931412410','address'=>'CatQue','level'=>1]
		]);
	}
}
