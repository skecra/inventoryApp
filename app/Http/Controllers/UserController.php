<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Database\Seeders\PositionSeeder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $content_header = "Employees list";
        $breadcrumbs = [
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Employees list', 'link' => '/users' ],
        ];
        return view('users.index', compact(['users', 'content_header', 'breadcrumbs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $content_header = "Add new employee";
        $breadcrumbs = [
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Employees list', 'link' => '/users'],
            [ 'name' => 'Add new employee', 'link' => '/users/create' ],
        ];
        return view('users.create', compact(['departments', 'content_header', 'breadcrumbs']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
//        dd($request->validated());
        User::query()->create($request->validated());
        return redirect('/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $department = Position::find($user->position_id)->department;
        $user->department = $department;
        $content_header = "Employee details";
        $breadcrumbs = [
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Employees list', 'link' => '/users'],
            [ 'name' => 'Add new employee', 'link' => '/users/create' ],
        ];
        return view('users.show', compact(['user', 'breadcrumbs', 'content_header']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $departments = Department::all();
        $position = Position::find($user->position_id);
        $content_header = "Edit Employee";
        $department = $position->department;
        $breadcrumbs = [
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Edit employee', 'link' => '/users'],
            [ 'name' => 'Add new employee', 'link' => '/users/edit' ],
        ];
        return view('users.edit', compact(['user', 'departments', 'department', 'breadcrumbs', 'content_header']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->except('password'));
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
