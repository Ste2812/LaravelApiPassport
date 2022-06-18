<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $player= Role::create(['name'=>'user']);

        Permission::create(['name'=>'dashboard']);
        Permission::create(['name'=>'user_update']);
        Permission::create(['name'=>'user_delete']);
        Permission::create(['name'=>'user_index']);
        Permission::create(['name'=>'logout']);
        Permission::create(['name'=>'store']);
        Permission::create(['name'=>'update']);
        Permission::create(['name'=>'create_game']);
        Permission::create(['name'=>'delete_game']);
        Permission::create(['name'=>'show_players']);
        Permission::create(['name'=>'show_games']);
        Permission::create(['name'=>'ranking']);
        Permission::create(['name'=>'lowest_ranking']);
        Permission::create(['name'=>'highest_ranking']);


    }
}
