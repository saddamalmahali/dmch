<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $operator_user = new Role();
        $operator_user->name='User';
        $operator_user->description = 'Normal User';
        $operator_user->save();

        $admin_user = new Role();
        $admin_user->name = 'Admin';
        $admin_user->description ='Admin User';
        $admin_user->save();


    }
}
