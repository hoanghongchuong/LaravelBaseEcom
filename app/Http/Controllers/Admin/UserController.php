<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index() {
        $users = $this->user->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function edit($id) {

    }
    public function create() {
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }
    public function store(Request $request) {
        $user = $this->user->create([
           'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->roles()->attach($request->role_id);
        return redirect()->route('users.index')->with('success', 'Thêm thành công');
    }
    public function update(Request $request, $id) {

    }
    public function delete($id) {

    }
}
