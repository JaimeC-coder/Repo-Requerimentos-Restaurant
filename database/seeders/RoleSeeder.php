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
        //
        $role1=Role::create(['name' => 'admin']);//adminstrator
        $role2=Role::create(['name' => 'receptionist']);//recepcionista
        $role3=Role::create(['name' => 'warehouse manager']);//almacenista
        $role4=Role::create(['name' => 'waiter']);//mesero
        $role5=Role::create(['name' => 'cook']);//cocinero

        //dashboard
        Permission::create(['name' => 'dashboard.admin'])->syncRoles([$role1]);
        Permission::create(['name' => 'dashboard.receptionist'])->syncRoles([$role2]);
        Permission::create(['name' => 'dashboard.warehouse'])->syncRoles([$role3]);
        Permission::create(['name' => 'dashboard.waiter'])->syncRoles([$role4]);
        Permission::create(['name' => 'dashboard.cook'])->syncRoles([$role5]);
        //reservation
        Permission::create(['name' => 'reservation.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'reservation.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'reservation.delete'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'reservation.index'])->syncRoles([$role1,$role2]);
        //tables
        Permission::create(['name' => 'tables.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'tables.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tables.delete'])->syncRoles([$role1]);
        Permission::create(['name' => 'tables.index'])->syncRoles([$role1,$role2,$role4]);

        //categories
        Permission::create(['name' => 'categories.create'])->syncRoles([$role1,$role5]);
        Permission::create(['name' => 'categories.edit'])->syncRoles([$role1,$role5]);
        Permission::create(['name' => 'categories.delete'])->syncRoles([$role1]);
        Permission::create(['name' => 'categories.index'])->syncRoles([$role1,$role2,$role4,$role5]);
        Permission::create(['name' => 'categories.show'])->syncRoles([$role1]);
        //products
        Permission::create(['name' => 'products.create'])->syncRoles([$role1,$role5]);
        Permission::create(['name' => 'products.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.delete'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.index'])->syncRoles([$role1,$role2,$role4,$role5]);
        //clients
        Permission::create(['name' => 'clients.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'clients.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'clients.delete'])->syncRoles([$role1]);
        Permission::create(['name' => 'clients.index'])->syncRoles([$role1,$role2,$role4]);
        //employees
        Permission::create(['name' => 'employees.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'employees.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'employees.delete'])->syncRoles([$role1]);
        Permission::create(['name' => 'employees.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'employees.show'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        //roles
        Permission::create(['name' => 'roles.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.delete'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.show'])->syncRoles([$role1]);
        //permissions
        Permission::create(['name' => 'permissions.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.delete'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.show'])->syncRoles([$role1]);
        //reports
         //orders
         Permission::create(['name' => 'orders.create'])->syncRoles([$role1,$role2,$role4]);
         Permission::create(['name' => 'orders.edit'])->syncRoles([$role1,$role2,$role4]);
         Permission::create(['name' => 'orders.delete'])->syncRoles([$role1,$role2,$role4]);
         Permission::create(['name' => 'orders.index'])->syncRoles([$role1,$role2,$role4,$role5]);
         Permission::create(['name' => 'orders.show'])->syncRoles([$role1,$role2,$role4,$role5]);
        //elaboration -> admin and cook
        Permission::create(['name'=>'elaboration.index'])->syncRoles([$role1,$role5]);
        Permission::create(['name'=>'elaboration.show'])->syncRoles([$role1,$role5]);
        Permission::create(['name'=>'elaboration.create'])->syncRoles([$role1,$role5]);
        Permission::create(['name'=>'elaboration.edit'])->syncRoles([$role1,$role5]);
        Permission::create(['name'=>'elaboration.delete'])->syncRoles([$role1]);

        //puchases -> admin and warehouse manager
        Permission::create(['name'=>'purchases.index'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'purchases.show'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'purchases.create'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'purchases.edit'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'purchases.delete'])->syncRoles([$role1,$role3]);
        //supplies -> admin and warehouse manager
        Permission::create(['name'=>'supplies.index'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'supplies.show'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'supplies.create'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'supplies.edit'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'supplies.delete'])->syncRoles([$role1,$role3]);
        //suppliers -> admin and warehouse manager
        Permission::create(['name'=>'suppliers.index'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'suppliers.show'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'suppliers.create'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'suppliers.edit'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'suppliers.delete'])->syncRoles([$role1,$role3]);




    }
}
