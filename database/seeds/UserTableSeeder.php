<?php

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        
        DB::table('users')->insert([
            'id' => Uuid::uuid4(),
            'name' => 'User 1',
            'username' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}