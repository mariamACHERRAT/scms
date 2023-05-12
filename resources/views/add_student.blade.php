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
    <!--
  Heads up! 👋

  Plugins:
    - @tailwindcss/forms
-->

<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
  <div class="mx-auto max-w-lg">
   
    <form
    action="{{ route('store') }}"
      class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8"
    >
    @csrf
      <p class="text-center text-lg font-medium">Add New Student</p>

      <div>
        <label for="text" class="sr-only"> Name</label>

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
  <label for="text" class="sr-only">class</label>

<div class="relative">
  <input
    type="text"
    name="class"
    id="class"
    class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
    placeholder="Class"
  />
</div>
        </div>
      </div>
</br>



      <button
        type="submit"
        class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white"
      >
       ADD
      </button>

      
    </form>
  </div>
</div>

</body>
</html>