<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    
<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
  <div class="mx-auto max-w-lg">
  <form method="POST" action="{{ route('teachers.update', $user->id) }}">
    @csrf
    @method('PUT')
    <p class="text-center text-lg font-medium">Update Student</p>

<div>
  <label for="text" class="sr-only">Name</label>

  <div class="relative">
    <input
      type="text"
      name="name"
      id="name"
      class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
      value="{{  $user->name }}"
    />
  </div>
</div></br>
<div>
<label for="text" class="sr-only">emaill</label>

    <div class="relative">
     <input
     type="email"
    name="email"
      id="email"
      class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
      value="{{ $user->email }}"
/>

  </div>
</div>
</br>
    <button type="submit" class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white">Update</button>
</form>
</div>
</div>
</body>
</html>