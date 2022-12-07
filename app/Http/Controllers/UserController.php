<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function readLoginEmail($email, $password)
    {
       return User::where('email', '=', $email)->where('password', '=', $password)->get();
    }

    public function readId($id)
    {
       return User::where('id_user', '=', $id)->get();
    }
    
    public function readLoginUsername($username, $password)
    {
       return User::where('username', '=', $username)->where('password', '=', $password)->get();
    }

    public function readEmail($email)
    {
       return User::where('email', '=', $email)->get();
    }

    public function readUsername($username)
    {
       return User::where('username', '=', $username)->get();
    }

    public function readIG($ig)
    {
       return User::where('instagram', '=', $ig)->get();
    }

    
    public function readAll(){
        return User::all();
    }

    public function create(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->instagram= $request->instagram;
        $user->password = $request->password;
        

        $user->save();
        return "Data added successfully";
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
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {
        $user = User::find($id_user);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->instagram= $request->instagram;
        $user->password = $request->password;
        

        $user->save();
        return "Data changed successfully";
    }

    public function delete($id_user){
        $user = User::find($id_user);
        $user->delete();
        
        return "Data deleted successfully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        //
    }
}
