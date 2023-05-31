<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
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
      

    <div class="p-10 flex flex-wrap gap-9" style="margin-left:2%;p">

        <!--Card 1-->
        @foreach($courses as $course)
        <a href="{{ route('course.show', $course->id) }}">
            <div class="rounded overflow-hidden shadow-lg flex flex-wrap items-start" style=" background-color: white; max-width: 300px; border-radius: 11px; min-height: 500px;">
                <img class="w-full" src="{{ asset('images/' . $course->image) }}" style="max-height: 200px; min-height: 200px;" alt="Mountain">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2" style="text-align: center;">{{ $course->title }}</div>
                    <h5 class="text-green-800">Content</h5>
                    <div class="course-description">
                    <p class="text-gray-600 text-base">
                     {{ $course->content}}
                    </h4>
                   </div>
                </div>
                <h6 class="text-green-800 text-xs" style="margin-left: 17px">
                    SKILL LEARNED FROM THE LESSON
                </h6>
                <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-black rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">{{ $course->skills}}</span>
                    <!-- <span class="inline-block bg-black rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">{{ $course->skills}}</span>
                    <span class="inline-block bg-black rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">{{ $course->skills}}</span> -->
                    <a href="{{ route('send-request', ['student_name' => Auth::user()->name, 'course_id' => $course->id]) }}" class="inline-block bg-emerald-700  focus:outline-none focus:ring-4 text-white font-medium rounded-lg text-sm px-5 py-2.5 ml-6 mb-2 mt-12" style="width:80%;text-align:center">
                        Send Request
                    </a>
                </div>
            </div>
        </a>
        @endforeach
    </div>
  

</x-app-layout>



</body>
</html>
