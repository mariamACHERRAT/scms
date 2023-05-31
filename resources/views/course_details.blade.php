<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Tailwind CSS -->
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

  <title>Course Details</title>
  <style>
    body {
      background-color: #F5F7FA;
    }
  </style>
</head>
<body>

<x-app-layout>
  <div style="margin-top:20px">
  <a href="{{ route('generate-pdf', ['courseId' => $course->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-12 ">Download PDF</a>

  </div>
<h1 class="text-xl text-center mt-12 text-green-600">Directed by MR.{{ $course->professor->name }}</h1>
<?php $user =Auth::user()?>
@if ($user->is_prof && $user->id === $course->user_id)
  <div style="margin-top:20px;margin-left:86%;"><a href="{{ route('publish-course', ['course' => $course->id]) }}" class="focus:outline-none text-white bg-emerald-700 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 " >Publish</a></div>
  @endif  
  <div class="pt-6 bg-gray-50">
    <div id="card" class="">
      <!-- container for all cards -->
      <div class="container w-100 lg:w-4/5 mx-auto flex flex-col">
        <!-- card -->
        <div v-for="card in cards" class="flex flex-col md:flex-row overflow-hidden bg-white shadow-xl mt-4 w-100 mx-2">
          <!-- media -->
          <div class="h-64 w-auto md:w-1/2">
            <img class="inset-0 h-full w-full object-cover object-center" src="{{ asset('images/' . $course->image) }}" style="height:300px"/>
          </div>
          <!-- content -->
          <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
            <div class="flex justify-end items-center">
            <?php $user =Auth::user()?>
          @if ($user->is_prof && $user->id === $course->user_id)
              <a href="{{ route('courses.edit', ['id' =>  $course->id]) }}" class="mr-4">
                <img src="{{ asset('image/modify.png') }}" class="w-20" alt="Modifier" style="max-height: 20px; width:20px;">
              </a>
              <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this course?')) { document.getElementById('delete-form').submit(); }">
                <img src="{{ asset('image/delete.png') }}" class="w-20" alt="Supprimer" style="max-height: 20px; width:20px;">
              </a>
              <form id="delete-form" action="{{ route('courses.destroy', ['id' => $course->id]) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
              </form>
         @endif  
            </div>
            <h3 class="font-semibold text-2xl leading-tight truncate" style="text-align: center;">{{ $course->title }}</h3>
            <p class="mt-2 text-green-800">
              CONTENT
            </p>
            <p class="mt-2 text-gray-600">
              {{ $course->content }}
            </p>
            <p class="text-sm text-green-800 uppercase tracking-wide font-semibold mt-2">
              SKILL LEARNED FROM THE LESSON
            </p><br></br>
            <div class="flex items-center">
              <span class="inline-block bg-black px-3 py-1 text-sm font-semibold text-white mr-2 mb-2 rounded-full ...">{{ $course->skills }}</span>
              <!-- <span class="inline-block bg-black px-3 py-1 text-sm font-semibold text-white mr-2 mb-2 rounded-full ...">{{ $course->skills }}</span>
              <span class="inline-block bg-black px-3 py-1 text-sm font-semibold text-white mr-2 mb-2 rounded-full ...">{{ $course->skills }}</span> -->
            </div>
            <?php $user =Auth::user()?>
            @if ($user->is_prof)
            <a href="{{ route('sections.create', ['course_id' => $course->id]) }}"><img src="{{ asset('image/add.png') }}" class="w-20 ... mt-0 cursor-pointer" alt="" srcset="" style="max-height: 40px; width:40px;margin-left:95%"></a>
            @endif  
          </div>
        </div><!--/ card-->
      </div><!--/ flex-->
    </div>
  </div>
  <div class="mb-0 h-50" style="margin-left:4%;width:93%;">
    @foreach($course->sections as $section)
      <a href="{{ route('sections.show', ['id' => $section->id]) }}">
        <div class="bg-white shadow-xl mt-4 w-100 mx-24 flex items-center justify-between" style="padding:20px;">
          <h2 class="text-lg font-semibold">{{ $section->title }}</h2>
          <?php $user =Auth::user()?>
            @if ($user->is_prof)
          <div class="flex items-center">
            <a href="{{ route('sections.edit', ['id' =>  $section->id]) }}" class="mr-4">
              <img src="{{ asset('image/modify.png') }}" class="w-20" alt="Modifier" style="max-height: 20px; width:20px;">
            </a>
            <a href="{{ route('sections.destroy', ['id' => $section->id]) }}" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this section?')) { document.getElementById('delete-form-{{ $section->id }}').submit(); }">
              <img src="{{ asset('image/delete.png') }}" class="w-20" alt="Supprimer" style="max-height: 20px; width:20px;">
            </a>
            <form id="delete-form-{{ $section->id }}" action="{{ route('sections.destroy', ['id' => $section->id]) }}" method="POST" style="display: none;">
              @csrf
              @method('DELETE')
            </form>
          </div>
          @endif 
        </div>
      </a>
      <!-- @if ($section->video_link)
        <div class="w-full h-0 pb-56 relative">
          <iframe width="560" height="315" src="{{ $section->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      @endif -->
    @endforeach
  </div>
</x-app-layout>
</body>
</html>
