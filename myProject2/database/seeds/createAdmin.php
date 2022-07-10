<?php

use Illuminate\Database\Seeder;
use App\admins;
class createAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        admins::create([
            'email'=> 'admin@gmail.com',
            'username'=> 'admin',
            'password'=> bcrypt(123456),
            'photo'=> 'default.gif'
        ]);
    }
}
