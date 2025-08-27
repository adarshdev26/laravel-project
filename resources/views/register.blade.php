<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <x-layout>
    <x-slot:heading>
    Register new
    </x-slot:heading>
  </x-layout>

  @if(session('success'))
  <p style="color: green">{{ session('success') }}</p>
@endif
  <h2>Add user</h1>
   <div class="flex justify-center mt-4 p-5">
    
    <form action="adduser" method="POST" enctype="multipart/form-data">
        @csrf
       <div class='form-div'>
       <label>Full Name</lable>
       <input 
       type='text'
        placeholder='enter your name'
        name="fullname"
        class="p-2 rounded-2xl m-2"
         />
       </div>
       <div class='form-div'>
       <label>Email</lable>
       <input type='email'
        placeholder='enter your email'
        name="email"
         class="p-2 rounded-2xl m-2"
        />
       </div>
       <div class='form-div'>
       <label>City</lable>
       <input 
       type='text'
        placeholder='enter your city' 
        name="city"
         class="p-2 rounded-2xl m-2"
        />
       </div> 
       <div class='form-div'>
        <label>Password</lable>
        <input 
        type='password'
         placeholder='enter your password' 
         name="password"
          class="p-2 rounded-2xl m-2"
         />
        </div> 
       <div class="form-div p-2">
       <input type="file" name="upload_files[]" multiple />
       </div>
       <div class="p-2 bg-black text-white rounded-2xl">
       <button>Submit</button>
       </div>
    </form>
  
</div>
<div class="text-center">
  <a href="/login"
 class="text-center">Already regsiter?
  <span class="text-blue-400 underline">Login
    </span></a>
</div>
</body>
</html>