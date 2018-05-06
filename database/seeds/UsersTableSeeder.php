<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'brian',
                'brian@test.com',
                '12345'
            ],
        ];
        foreach($users as $userData) {
            $user = new User();
            $user->id = 1;
            $user->name = $userData[0];
            $user->email = $userData[1];
            $user->password = Hash::make($userData[2]);
            $user->save();
        }
    }
}
