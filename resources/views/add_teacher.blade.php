<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
    @vite('resources/css/app.css')
</head>
<body>
    <!--
  Heads up! 👋

  Plugins:
    - @tailwindcss/forms
-->
<x-app-layout>   
<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
  <div class="mx-auto max-w-lg">
   
    <form
    
    action="{{ route('teacher-store') }}"
      class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8"
    >
    @csrf
      <p class="text-center text-lg font-medium">Add New Teacher</p>

      <div>
        <label for="text" class="sr-only">Name</label>

        <div class="relative">
          <input
            type="text"
            name="name"
            id="name"
            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
            placeholder="Name"
          />
        </div>
      </div>
</br>
  <div>
        <label for="text" class="sr-only">email</label>

        <div class="relative">
          <input
            type="email"
            name="email"
            id="email"
            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
            placeholder="Email"
          />
        </div>
      </div></br>
      <button
        type="submit"
        class="block w-full rounded-lg bg-emerald-700 px-5 py-3 text-sm font-medium text-white"
      >
       ADD
      </button>
        </div>
     
      </div>
</br>



     

      
    </form>
  </div>
</div>
</x-app-layout>   
</body>
</html>