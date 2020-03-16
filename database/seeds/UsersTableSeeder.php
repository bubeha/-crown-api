<?php

use App\ReadModels\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $user = User::where('email', '=', 'admin@example.com')->first();


        if ($user) {
            return;
        }

        $user = new User([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
        ]);

        $user->save();

    }

}
