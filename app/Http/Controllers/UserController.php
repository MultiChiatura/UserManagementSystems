<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::when(request()->get('keyword'), function($q){
            $q->where('name', "LIKE", "%".request()->get('keyword')."%")
                ->orWhere('email', "LIKE", "%".request()->get('keyword')."%");
        })
        ->select('id', 'role_id', 'name', 'email', 'position', 'phone', 'address')
        ->with('role:id,name')
        ->paginate(1000);

        return view('pages.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();
        return view('pages.users.create',[
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $requestData = $request->validated();
        $randPass = Str::random(6);
        $requestData['password'] = Hash::make($randPass);
        User::create($requestData);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load('role');

        return view('pages.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('pages.users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
