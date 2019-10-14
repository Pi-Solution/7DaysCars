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
     * Assign Amin role to first user in db
     *
    */
    public function assingAdminRole(){
        Role::create(['name' => 'Admin']);
        Permission::create(['name' => 'Verify Posts']);

        $role = Role::findById(1);
        $permission = Permission::findById(1);
        $role->givePermissionTo($permission);

        User::find(0)->assignRole('Admin');

        redirect('/');
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
