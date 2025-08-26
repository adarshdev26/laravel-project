<x-layout>
    <x-slot:heading>
       Users
    </x-slot:heading>
</x-layout>

<div class="w-full max-w-5xl mx-auto">
    <h1 class="text-center text-2xl">All registered Users</h1>
<table border="1" cellpadding="10"> 
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
                <form action="{{route('users.delete', $user->id)}}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button class="bg-black py-4 px-2 rounded-2xl text-white" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

</table>
</div>