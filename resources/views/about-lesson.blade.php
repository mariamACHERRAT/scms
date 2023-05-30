<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Rainblur Landing Page Template: Tailwind Toolbox</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
  <!--Replace with your tailwind.css once created-->
  <link href="https://unpkg.com/@tailwindcss/custom-forms/dist/custom-forms.min.css" rel="stylesheet" />

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

    html {
      font-family: "Poppins", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      background-size: cover;
      background-position: center;
    }

    body {
      margin: 0;
      padding: 0;
    }
  </style>
</head>

<body class="leading-normal tracking-normal text-indigo-400 ">
<div class="h-full" id="container" >
  <!--Nav-->
  <div class="w-full container bg-white border-b border-gray-100 h-20 shadow-lg ml-0... mr-0...">
    <div class="w-full flex items-center justify-between">
      <a class="flex items-center text-indigo-400 no-underline hover:no-underline font-bold text-2xl lg:text-4xl ml-4 ..." href="#">
        SC<span class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 via-pink-500 to-purple-500">MC</span>
      </a>

      <div class="flex w-1/2 justify-end content-center">
      <a href="{{ route('home') }}" class="inline-block no-underline hover:text-pink-500 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out">Home</a>
        
        <a  href="{{ route('aboutus') }}"  class="inline-block no-underline hover:text-pink-500 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out">About</a>

        @if (Route::has('login'))

          @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
          @else
            <a href="{{ route('login') }}" class="inline-block no-underline hover:text-pink-500 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out">Log in</a>

            <!-- @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif -->
          @endauth

        @endif
        <a class="inline-block no-underline hover:text-pink-500 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out" href="https://www.instagram.com/">
          <img class="fill-current h-6" src="{{ asset('image/instagram.png') }}" href="https://www.instagram.com/scmc_tetouan/"/>

        </a>
        <a
          class="inline-block text-blue-300 no-underline hover:text-pink-500 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out"
          href="https://web.facebook.com/profile.php?id=100054450282737"
        >
          <svg class="fill-current h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
            <path d="M19 6h5V0h-5c-3.86 0-7 3.14-7 7v3H8v6h4v16h6V16h5l1-6h-6V7c0-.542.458-1 1-1z"></path>
          </svg>
        </a>
      </div>
    </div>
  </div>

  <!--Main-->
  <div class="p-10 flex flex-wrap bg-gray-50" style="padding-right: 0;margin:0;">
    <div  style=";margin-top:10px;width:45%">
      <p style="font-size:30px;margin-left:38%;color:black">{{ $course->title }}</p>
      <p class="mt-2 text-gray-600">
              {{ $course->content }}
        </p>
    </div>
    <div class="flex items-center justify-center ml-auto" style="width:50%;max-height:400px">
      <img class="w-full" src="{{ asset('images/' . $course->image) }}" alt="Mountain" style="max-height:400px" >
    </div>
  </div>
</div>

<div>
<p style="font-size:30px;margin-left:15%;margin-top:30px;color:black">Program Details</p>
<div style="width:40%;margin-left:5%">
<p class="mt-2 text-gray-600">
Our expert instructors are passionate about delivering high-quality education through interactive and engaging content. You'll have the opportunity to interact with instructors and fellow learners, fostering a collaborative and supportive learning environment. Additionally, our online platform provides access to a wealth of resources, including multimedia materials, quizzes, and discussion forums, to enhance your learning experience. Join us today and embark on a journey of knowledge and personal growth with our comprehensive online courses!
</p>
 </div>

 <p style="font-size:30px;margin-left:15%;margin-top:30px;color:black">Skills You Will Gain</p>
    <div class="px-6 pt-4 pb-2" style="margin-left:5%;border:solid 1px gray;padding:3%;margin-top:30px">
        <span class="inline-block bg-black rounded-full px-7 py-3   text-white mr-2 mb-2"> {{ $course->skills}}</span>
        <span class="inline-block bg-black rounded-full px-7 py-3  text-white mr-2 mb-2"> {{ $course->skills}}</span>
        <span class="inline-block bg-black rounded-full px-7 py-3 text-white mr-2 mb-2"> {{ $course->skills}}</span>
      </div>
 <div>

 <p style="font-size:30px;margin-left:38%;margin-top:30px;">Sections</p>
 @foreach($course->sections as $key => $section)
<div class="flex" style="margin-left:36%">
<span class="bg-purple-900 p-4 pt-2 pb-2 rounded-full text-white">{{ $key + 1 }}</span><h2 class="ml-4 mt-2" style="font-size:20px"><h2 >{{ $section->title }}</h2></h2>
</div>
<div style="border:solid 1px Indigo;width:2px;height:80px;margin-left:37%"></div>
 </div>
@endforeach

  

</div>


<!--Footer-->
<div class="w-full pt-16 pb-6 text-sm text-center md:text-left fade-in">
          <a class="text-gray-500 no-underline hover:no-underline" href="#">&copy; 2023</a>
          
        </div>
</body>
</html>
