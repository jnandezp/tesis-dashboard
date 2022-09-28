<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Jose Ivan',
            'last_name' => 'Nandez Parra',
            'email' => 'jnandezp@gmail.com',
            'email_verified_at' => now(),
            'phone' => '2225996709',
            'password' => Hash::make('12341234'), // password
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('admin');

        if (config('app.debug') == 'local'){
            User::factory(50)->create();
        }
    }
}
