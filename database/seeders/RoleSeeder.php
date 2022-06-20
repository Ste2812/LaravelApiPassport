<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission as ContractsPermission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;



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

        Permission::create(['name' => 'dashboard'])->assignRole($admin);
        Permission::create(['name' => 'user.create'])->syncRoles([$admin, $player]);
        Permission::create(['name' => 'login'])->syncRoles([$admin, $player]);
        Permission::create(['name' => 'user.update'])->syncRoles([$admin, $player]);
        Permission::create(['name' => 'user.delete'])->syncRoles([$admin, $player]);
        Permission::create(['name' => 'index'])->assignRole($admin);
        Permission::create(['name' => 'logout'])->syncRoles([$admin, $player]);
        Permission::create(['name' => 'store'])->syncRoles([$admin, $player]);
        Permission::create(['name' => 'update'])->syncRoles([$admin, $player]);
        Permission::create(['name' => 'create.game'])->syncRoles([$admin, $player]);
        Permission::create(['name' => 'delete.game'])->syncRoles([$admin, $player]);
        Permission::create(['name' => 'show.players'])->assignRole($admin);
        Permission::create(['name' => 'show.games'])->assignRole($admin);
        Permission::create(['name' => 'ranking'])->assignRole($admin);;
        Permission::create(['name' => 'lowest.ranking'])->assignRole($admin);
        Permission::create(['name' => 'highest.ranking'])->assignRole($admin);





    }
}
