<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        DB::table('users')->insert([
            [
                'name' => 'ahmed siam',
                'email' => 'ahmedraedsiam@gmail.com',
                'password' => Hash::make('123456789++'),
                'avatar_url' => 'ahmed siam/me.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'ahmed raed siam',
                'email' => 'ahmedraedsiam@hotmail.com',
                'password' => Hash::make('123/123'),
                'avatar_url' => 'ahmed raed siam/me.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
