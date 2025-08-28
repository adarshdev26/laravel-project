<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registeruser;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    function adduser(Request $request) {

        //validate first
        $request->validate([
            'fullname' => 'required|string|max:225',
            'email' => 'required|email|unique:registerusers,email',
            'city' => 'required|string|max:225',
            'password' => 'required',
              'upload_files.*' => 'required|mimes:jpg,png,pdf|max:2048'
        ]);
        
        
        //get the uploaded file
        $uploadedFiles = $request->file('upload_files');
        $filepath = [];

        if($uploadedFiles) {
            foreach($uploadedFiles as $file) {
                $originalName = $file->getClientOriginalName();
                $path = $file->storeAs('uploads', time().'_'.$originalName, 'public');
               $filepath[] = $path;
            }
        }
       
       $password = $request->password;
       $hashedPassword = Hash::make($password);

        //save to database
        Registeruser::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'city' => $request->city,
            'password' => $hashedPassword,
            'file_path' => json_encode($filepath),
        ]);
        return back()->with('success', 'User registered successfully');
    }

    // login user
    public function loginUser(Request $request) 
    {
         //validate first
         $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

       $email = $request->email;
       $user = Registeruser::where('email', $email)->first();
       if ($user && Hash::check($request->password, $user->password)) {
        session(['id' => $user->id]);
        session(['email' => $user->email]);
        return redirect('/dashboard');
       }else{
        return back()->with('error', 'User not exists');
      
       }
        
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
       if($user) {
        $user->delete();
        return back()->with('success', 'User deleted successfully');
       }
    }


}