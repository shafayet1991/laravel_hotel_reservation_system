<?php

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\System\User\User;

Route::group(['namespace' => 'Admin\System','middleware' => 'auth'], function () {

    Route::get('/test', function(){

//        auth()->user()->givePermissionTo('edit post','write post');
//        auth()->user()->syncRole('writer');
//        $user = auth()->user()->getDirectPermissions();
//        $user = auth()->user()->getPermissionsViaRoles();
//        $user = auth()->user()->getAllPermissions();
//        $user = auth()->user()->permissions;
//        $user = auth()->user()->roles()->permissions;
//        $user = User::role('writer')->get();
//        dd($user);


//        Role::create(['name' =>'editor']);
//        Permission::create(['name' =>'edit post']);

//        $role = Role::findById(2);
//        $permission = Permission::with('roles')->get();
//        dd($role->revokePermissionTo($permission));
//        $role->syncPermissions($permission);


    });

    Route::group(['namespace' => 'Authority'], function () {
        Route::resource('role', 'RoleController');
        Route::resource('permission', 'PermissionController');
    });

});