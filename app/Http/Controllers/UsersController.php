<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\Role;

class UsersController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        $roles = Role::all();
        return $dataTable->render('users.index', compact('roles'));
    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}
