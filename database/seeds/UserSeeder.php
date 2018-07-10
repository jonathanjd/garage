<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User();
        $user->name = 'Jonathan Duran';
        $user->email = 'headjd@gmail.com';
        $user->password = bcrypt('123456');
        $user->type = 'client';
        $user->save();

        $user = new User();
        $user->name = 'Super Admin';
        $user->email = 'admin@garagesale.com';
        $user->password = bcrypt('123456');
        $user->type = 'admin';
        $user->save();
    }
}
