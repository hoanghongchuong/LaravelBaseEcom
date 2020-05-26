<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index() {
        $users = $this->user->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function edit($id) {

    }
    public function create() {

        return view('admin.user.add');
    }
    public function store(Request $request) {

    }
    public function update(Request $request, $id) {

    }
    public function delete($id) {

    }
}
