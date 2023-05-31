<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="resources\css\app.css.css">
</head>
<body>
<form class="mt-6 ... w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Title</label>
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
          type="text" id="title" name="title" >
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Content</label>
        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" id="content" name="content" required></textarea>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Skill</label>
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
          type="text" id="skills" name="skills" ><br></br>
        <!-- <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
          type="text" id="skills" name="skills" ><br></br>
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
          type="text" id="skills" name="skills" > -->
      </div>
      
      <div class="mb-4">
      <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image du produit</label>
            <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" id="image" name="image">
      </div>
      <input type="hidden" name="user_id" value="{{ Auth::id() }}">

      <button type="submit" class="bg-emerald-700 text-white font-bold py-2 px-4 rounded">ADD</button>
    </form>
</body>
</html>