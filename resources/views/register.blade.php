<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black">
  <x-layout>
    <x-slot:heading>
    Register new
    </x-slot:heading>
  </x-layout>

  @if(session('success'))
  <p style="color: green">{{ session('success') }}</p>
@endif
  <h2>Add user</h1>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="mx-auto h-10 w-auto" />
        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">Sign up</h2>
      </div>
      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form action="adduser" method="POST" enctype="multipart/form-data">
        @csrf
       <div class='form-div'>
       <label class="block text-sm/6 font-medium text-gray-100">Full Name</lable>
        <div class="mt-2">
       <input 
       class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"
       type='text'
        placeholder='enter your name'
        name="fullname"
        class="p-2 rounded-2xl m-2"
         />
        </div>
       </div>
       <div class='form-div'>
       <label class="block text-sm/6 font-medium text-gray-100">Email</lable>
        <div class="mt-2">
       <input 
       class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"
       type='email'
        placeholder='enter your email'
        name="email"
         class="p-2 rounded-2xl m-2"
        />
        </div>
       </div>
       <div class='form-div'>
       <label class="block text-sm/6 font-medium text-gray-100">City</lable>
        <div class="mt-2">
       <input 
       class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"
       type='text'
        placeholder='enter your city' 
        name="city"
         class="p-2 rounded-2xl m-2"
        />
        </div>
       </div> 
       <div class='form-div'>
        <label class="block text-sm/6 font-medium text-gray-100">Password</lable>
          <div class="mt-2">
        <input 
        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"
        type='password'
         placeholder='enter your password' 
         name="password"
          class="p-2 rounded-2xl m-2"
         />
          </div>
        </div> 
       <div class="form-div p-2">
        <div class="mt-2">
       <input 
       class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"
       type="file" name="upload_files[]" multiple />
        </div>
       </div>
       <div class="p-2 bg-black text-white rounded-2xl">
       <button>Submit</button>
       </div>
    </form>
  </div>
  
</div>
<div class="text-center">
  <a href="/login"
 class="text-center">Already regsiter?
  <span class="text-blue-400 underline">Login
    </span></a>
</div>
</body>
</html>