<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Tailwind CSS -->
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">


  <title>Tailwind CSS CDN</title>

</head>
<body>

<x-app-layout>  


  <div class="pt-6 pb-12 bg-gray-100">  
  <div id="card" class="">
 
    <!-- container for all cards -->
    <div class="container w-100 lg:w-4/5 mx-auto flex flex-col">
      <!-- card -->
      <div v-for="card in cards" class="flex flex-col md:flex-row overflow-hidden
                                        bg-white rounded-lg shadow-xl  mt-4 w-100 mx-2">
        <!-- media -->
        
        <div class="h-64 w-auto md:w-1/2">
          <img class="inset-0 h-full w-full object-cover object-center" src="{{ asset('images/' . $course->image) }}" />
        </div>
        <!-- content -->
        <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
       <a href="{{ route('courses.edit', ['id' =>  $course->id]) }}"> <img src="{{ asset('image/modify.png') }}" class="w-20 ... mt-0" alt="" srcset="" style="max-height: 20px; width:20px;margin-left:96%"></a>
        <h3 class="font-semibold text-2xl leading-tight truncate"  style="text-align: center;">  {{ $course->title }}</h3>
        
          <p class="mt-2 text-green-800">
          CONTENT
          </p>
          <p class="mt-2 text-gray-600">
          {{ $course->content}}
          </p>
          <p class="text-sm text-green-800 uppercase tracking-wide font-semibold mt-2">
          SKILLS LEARNED FROM THE LESSON
          </p>
            
          <div class="flex items-center">
          
          <span class="inline-block bg-black rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2"> {{ $course->skills}}</span>
        <span class="inline-block bg-black rounded-full px-3 py-1 text-sm font-semibold text-white  mr-2 mb-2"> {{ $course->skills}}</span>
        <span class="inline-block bg-black rounded-full px-3 py-1 text-sm font-semibold text-white  mr-2 mb-2"> {{ $course->skills}}</span>
        </div>

       <a href="{{ route('sections.create') }}"> <img src="{{ asset('image/add.png') }}" class="w-20 ... mt-0 cursor-pointer" alt="" srcset="" style="max-height: 40px; width:40px;margin-left:95%" ></a>

        

      
        </div>
      </div><!--/ card-->
    </div><!--/ flex-->
  </div>
</div>


  </x-app-layout>
</body>
</html>