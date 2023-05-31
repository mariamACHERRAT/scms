
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')

    <style>

.course-description {
        display: -webkit-box;
        -webkit-line-clamp: 4; /* Limit the description to 4 lines */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis; /* Add ellipsis for overflowed text */
      }
    </style>
</head>

<body>

<x-app-layout>    
<div style="margin-top:20px;margin-left:86%;"><a href="{{ route('course.create') }}" class="focus:outline-none text-white bg-green-600 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-800">ADD COURSE</a>
</div>




<div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
    <!--Card 1-->
        @foreach($courses as $course)
        <a href="{{ route('course.show', $course->id) }}">
    <div class="rounded overflow-hidden shadow-lg" style=" background-color: white;max-width: 300px; border-radius: 11px;min-height: 500px;">
      <img class="w-full " src="{{ asset('images/' . $course->image) }}" style="max-height: 200px;min-height: 200px;" alt="Mountain">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2" style="text-align: center;"> {{ $course->title }}</div>
        <h5 class="text-green-800" >Content</h5>
        <p class="text-gray-600 text-base">
        <div class="course-description">
         {{ $course->content}}
    </div>
         </h4>
      </div>
      <h6 class="text-green-800 text-xs" style="margin-left: 17px">
          SKILL LEARNED FROM THE LESSON
</h6>
      <div class="px-6 pt-4 pb-2">
        <span class="inline-block bg-black rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2"> {{ $course->skills}}</span>
        <!-- <span class="inline-block bg-black rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2"> {{ $course->skills}}</span>
        <span class="inline-block bg-black rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2"> {{ $course->skills}}</span> -->
      </div>
    </div>
    
     </a>
      @endforeach
</div>
    </x-app-layout>
</body>
</html>























