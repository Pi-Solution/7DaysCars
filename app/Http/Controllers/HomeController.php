<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     *
     * Assign Admin role to first user in db
     *
    */
    public function assingAdminRole(){

        $user_role = User::find(1)->hasRole('Admin');

        if ($user_role) {
            return redirect('/')->with(['Admin' => 'User admin@admin.com already has Admin role']);
        }else{
            Role::create(['name' => 'Admin']);
            Permission::create(['name' => 'Verify Posts']);

            $role = Role::findById(1);
            $permission = Permission::findById(1);
            $role->givePermissionTo($permission);

            User::find(1)->assignRole('Admin');

            return redirect('/')->with(['Admin' => 'You successfully Added Admin role to "admin@admin.com" user!!!']);
        }

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = auth()->user()->hasRole('Admin');

        if ($role) {
            session()->put('Admin', true);
        }

        return redirect('/home');
    }
}
