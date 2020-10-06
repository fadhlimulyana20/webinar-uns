<?php

namespace App\Http\Controllers\SuperUser;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('cari')){
            $users = User::where('email', 'LIKE', '%'.$request->cari.'%')->orWhere('nama', 'LIKE', '%'.$request->cari.'%')->get();
        }
        else{
          $users = User::all();
        }
        return view('superuser.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit-users')){
          return redirect(route('superuser.users.index'));
        }
        $roles = Role::all();

        return view('superuser.users.edit')->with([
          'user' => $user,
          'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        $user->nama = $request->nama;
        $user->email = $request->email;
        if($user->save())$request->session()->flash('success', $user->nama. ' has been updated');
        else $request->session()->flash('error', 'User could not be updated');

        return redirect()->route('superuser.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      if(Gate::denies('delete-users')){
        return redirect(route('superuser.users.index'));
      }

      $user->roles()->detach();
      $user->delete();

      return redirect()->route('superuser.users.index');
    }
}
