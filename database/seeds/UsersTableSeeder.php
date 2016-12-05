<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_operator = Role::where('name', 'User')->first();
        $role_admin = Role::where('name','Admin')->first();

        $operator = new User();
        $operator->name = 'Saddam';
        $operator->email = 'saddam.almahali@gmail.com';
        $operator->password = bcrypt('Bangga');
        $operator->save();
        $operator->roles()->attach($role_operator);

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@dmchgarut.com';
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
