<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\Role;
use App\Models\User;

class UsersController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        $roles = Role::all();
        return $dataTable->render('users.index', compact('roles'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back();
    }
}
