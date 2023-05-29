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
  background-image: url("image/header.png");
  background-size: cover;
  background-position: center;
}

    </style>
  </head>

  <body class="leading-normal tracking-normal text-indigo-400 m-6 bg-cover bg-fixed" style="background-image: url('header.png');">
    <div class="h-full">
      <!--Nav-->
      <div class="w-full container mx-auto">
        <div class="w-full flex items-center justify-between">
          <a class="flex items-center text-indigo-400 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
            SC<span class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 via-pink-500 to-purple-500">MC</span>
          </a>
       
          <div class="flex w-1/2 justify-end content-center">
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
      <div class="container pt-24 md:pt-36 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
          <h1 class="my-4 text-3xl md:text-5xl text-white opacity-75 font-bold leading-tight text-center md:text-left">
          Virtual 
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 via-pink-500 to-purple-500">
            lessons
            </span>
            
          </h1>
          <p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left">
          Learn at your own pace with our flexible online courses tailored to your needs.
          </p>
          <p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left">
          Découvrez une nouvelle façon d'apprendre avec notre plateforme moderne et conviviale de formation en ligne.          </p>

          <!-- <form class="bg-gray-900 opacity-75 w-full shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
              <label class="block text-blue-300 py-2 font-bold mb-2" for="emailaddress">
                Signup for our newsletter
              </label>
              <input
                class="shadow appearance-none border rounded w-full p-3 text-gray-700 leading-tight focus:ring transform transition hover:scale-105 duration-300 ease-in-out"
                id="emailaddress"
                type="text"
                placeholder="you@somewhere.com"
              />
            </div>

            <div class="flex items-center justify-between pt-4">
              <button
                class="bg-gradient-to-r from-purple-800 to-green-500 hover:from-pink-500 hover:to-green-500 text-white font-bold py-2 px-4 rounded focus:ring transform transition hover:scale-105 duration-300 ease-in-out"
                type="button"
              >
                Sign Up
              </button>
            </div>
          </form> -->
        </div>

        <!--Right Col-->
        <div class="w-full xl:w-3/5 p-12 overflow-hidden">
          <img class="mx-auto w-full md:w-4/5 transform -rotate-6 transition hover:scale-105 duration-700 ease-in-out hover:rotate-6" src="{{ asset('image/onligne.jpg') }}"/>
        </div>

       

        <!--Footer-->
        <div class="w-full pt-16 pb-6 text-sm text-center md:text-left fade-in">
          <a class="text-gray-500 no-underline hover:no-underline" href="#">&copy; 2023</a>
          
        </div>
      </div>
    </div>




    @foreach ($latestCourses as $course)
    <a href="{{ route('course.show', $course->id) }}">
        <div class="rounded overflow-hidden shadow-lg flex flex-wrap items-start" style=" background-color: white; max-width: 300px; border-radius: 11px; min-height: 500px;">
            <img class="w-full" src="{{ asset('images/' . $course->image) }}" style="max-height: 200px; min-height: 200px;" alt="Mountain">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2" style="text-align: center;">{{ $course->title }}</div>
                <h5 class="text-green-800">Content</h5>
                <p class="text-gray-600 text-base">
                    {{ $course->content}}
                </p>
            </div>
            <h6 class="text-green-800 text-xs" style="margin-left: 17px">
                SKILLS LEARNED FROM THE LESSON
            </h6>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-black rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">{{ $course->skills}}</span>
                <span class="inline-block bg-black rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">{{ $course->skills}}</span>
                <span class="inline-block bg-black rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">{{ $course->skills}}</span>
                
            </div>
        </div>
    </a>
    @endforeach
  </body>
</html>