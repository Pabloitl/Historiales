<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * @param
     */
    public function __construct()
    {
        $this->middleware('can:manipular roles');
    }

    function index()
    {
        return View::make('role.form')
            ->with('usuarios', User::all())
            ->with('roles', Role::all());
    }

    function changeRole(Request $request)
    {
        if ($request->accion == "Dar")
        {
            User::find($request->usuario)->assignRole($request->rol);
        }
        else
        {
            User::find($request->usuario)->removeRole($request->rol);
        }

        return View::make('role.form')
            ->with('success', true)
            ->with('usuarios', User::all())
            ->with('roles', Role::all());
    }

}
