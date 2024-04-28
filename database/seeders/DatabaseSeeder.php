<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ichal Admin',
            'email' => 'ichal@fic.com',
            'password' => Hash::make('pwdpwd'),
        ]);

        // data dumy for company
        Company::create([
            'name'=> "PT. Alwiros Maju Sejahtera",
            'email'=> "alwirosgroup@gmail.com",
            'address'=> "Jl. Dr Sutomo 2",
            'latitude'=> "-8.073246",
            'longitude'=> "111.897680",
            'phone' => '0866666666',
            'radius_km'=> "0.5",
            'time_in'=> "08.30",
            'time_out'=> "16.30",
        ]);


        $this->call([
            AttendanceSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}
