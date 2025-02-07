<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class roleAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          //
          $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $lenderRole = Role::create([
            'name' => 'lender'
        ]);

        $agentRole = Role::create([
            'name' => 'agent'
        ]);

        $RegistrantRole = Role::create([
            'name' => 'Registrant'
        ]);

        $user = User::create([
            'name' => 'Team Pusba',
            'email' => 'team@pusba.com',
            'phone' => '082120202025',
            'photo' => 'ade.png',
            'password' => bcrypt('123ade123')
        ]);

        $user->assignRole($adminRole);
    }
}
