<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="resources\css\app.css.css">
</head>
<body>
<form class="mt-6 ... w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" action="{{ route('courses.update', $course->id) }}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')

    <p class="text-center text-lg font-medium">Update Courses</p>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Title</label>
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
          type="text" id="title" name="title"   value="{{  $course->title }}" >
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Content</label>
        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" id="content" name="content" required>{{ $course->content }}</textarea>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Skills</label>
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
          type="text" id="skills" name="skills" value="{{  $course->skills }}" ><br></br>
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
          type="text" id="skills" name="skills" value="{{  $course->skills }}"><br></br>
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
          type="text" id="skills" name="skills" value="{{  $course->skills }}">
      </div>
      
      <div class="mb-4">
      <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image du produit</label>
            <input type="file" style="display: none;" id="imageInput" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"  name="image">
            <img src="{{ asset('images/' . $course->image) }}" style="border-radius:50%;width:70px;cursor:pointer;" alt="Course Image"
            onclick="document.getElementById('imageInput').click();"
            >
        </div>
      <input type="hidden" name="user_id" value="{{ Auth::id() }}">

      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">ADD</button>
    </form>
</body>
</html>