<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registeruser;

class UserController extends Controller
{
    function adduser(Request $request) {

        //validate first
        $request->validate([
            'fullname' => 'required|string|max:225',
            'email' => 'required|email|unique:registerusers,email',
            'city' => 'required|string|max:225',
            'upload_files' => 'required|mimes:jpg,png,pdf|max:2048',
        ]);
        
        //get the uploaded file
        $file = $request->file('upload_files');
  
        //get orginial name
        $originalName = $file->getClientOriginalName();

        //store image (inside storage/app/public/uploads)
        $path = $file->storeAs('uploads', time().'_'.$originalName, 'public');

        //save to database
        Registeruser::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'city' => $request->city,
            'file_path' => $path,
        ]);
        return back()->with('success', 'User registered successfully');
    }

    public function allUsers() 
    {
        $users = Registeruser::all();
        return view('users', compact('users'));
    }

    public function deleteUser($id) 
    {
       //find the user by id..
       $user = Registeruser::find($id);
       echo $user;

    }
}