<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            User::create([
                'name'           => 'driss',
                'email'          => 'contact@drissboumlik.com',
                'password'       => bcrypt('pacmav4C$'),
                'remember_token' => Str::random(60),
            ]);
        }
    }
}
