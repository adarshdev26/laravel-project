<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-layout>
        <x-slot:heading>
           Users
        </x-slot:heading>
    </x-layout>
    
    <div class="max-w-4xl mx-auto">
        <h1 class="text-center text-2xl">All registered Users</h1>
        @if (session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
        @endif
    
        @if($users)
        
        <table border="1" cellpadding="10" > 
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>City</th>
            </tr>

            @foreach($users as $user)
            <tr>
                <td>{{ $user->fullname}}</td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->city}}</td>
                <td>
                    @if($user->file_path)
                
                    <img src="{{ asset('storage/'. $user->file_path)}}"
                    alt="img"
                    width='80'
                    height="80"
                    />
                   
                    @endif
                </td>
                <td>
                    <form action="{{route('users.delete', $user->id)}}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="bg-black py-4 px-2 rounded-2xl text-white" type="submit">Delete</button>
                    </form>
                </td>
                <td>
                    <button class="open-button" onclick="openForm()">Edit</button>
                </td>
            </tr>
           
            @endforeach
    
    </table>
    @else
    No user found
    @endif
    
    <!-- The form -->


    
    </div>

</body>
</html>