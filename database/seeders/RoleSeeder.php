<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission as ContractsPermission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin= Role::create(['name' => 'admin']);
        $player= Role::create(['name' => 'user']);

        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'dashboard']);





    }
}
