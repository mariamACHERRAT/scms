


<x-app-layout>
   
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ml-2 ... mr-4 ... mt-6 ...">
    <a href="{{ route('teacher.create') }}" class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-800">ADD TEACHER</a>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-9 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                     Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                  Action
                </th>
                <th scope="col" class="px-6 py-3">
                  Action
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach( $users as  $user)
            <tr>
                <td class="px-6 py-4">{{ $user->id }}</td>
                <td class="px-6 py-4">{{  $user->name }}</td>
                <td class="px-6 py-4">{{  $user->email}}</td>
                <td class="px-6 py-4"> <a href="{{ route('teachers.edit', ['id' =>  $user->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> </td>
                <td class="px-6 py-4"> <form action="{{ route('teachers.destroy',  $user->id) }}" method="POST" class="inline-block">
    @csrf
    @method('DELETE')
    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline"
        onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</button>
</form> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>