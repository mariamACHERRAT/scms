<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
  <!--Replace with your tailwind.css once created-->
  <link href="https://unpkg.com/@tailwindcss/custom-forms/dist/custom-forms.min.css" rel="stylesheet" />
</head>
<body>

<!-- Nav -->
<div class=" w-full container bg-white border-b border-gray-100 h-20 shadow-lg ml-2" >
  <div class="w-full flex items-center justify-between  px-4 mr-0" >
    <a class="flex items-center text-indigo-400 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
      SC<span class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 via-pink-500 to-purple-500">MC</span>
    </a>

    <div class="flex w-1/2 justify-end content-center">
      <a href="{{ route('home') }}" class="inline-block no-underline hover:text-pink-500 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out">Home</a>

      <a href="{{ route('aboutus') }}" class="inline-block no-underline hover:text-pink-500 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out">About</a>

      @if (Route::has('login'))
        <a href="{{ route('login') }}" class="inline-block no-underline hover:text-pink-500 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out">Log in</a>
      @endif

      <a class="inline-block no-underline hover:text-pink-500 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out" href="https://www.instagram.com/">
        <img class="fill-current h-6" src="{{ asset('image/instagram.png') }}" href="https://www.instagram.com/scmc_tetouan/"/>
      </a>
      <a class="inline-block text-blue-300 no-underline hover:text-pink-500 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out" href="https://web.facebook.com/profile.php?id=100054450282737">
        <svg class="fill-current h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
          <path d="M19 6h5V0h-5c-3.86 0-7 3.14-7 7v3H8v6h4v16h6V16h5l1-6h-6V7c0-.542.458-1 1-1z"></path>
        </svg>
      </a>
    </div>
  </div>
</div>

<div class="flex items-center">
  <!-- First Div: Title and Text -->
  <div class="ml-12 mt-12" style="width:50%">
        
<a href="#" class="block  p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Abou Us</h5>
    <p class="font-normal text-xl text-gray-700 dark:text-gray-400">
    Welcome to our online training site !
      We are SCMC the first private institute for professional training in logistics and transport in tetouan, a company dedicated to providing quality training in the field of management and transport. Our goal is to help professionals acquire the skills necessary to excel in their respective fields.
      Our team of qualified and experienced experts ensures the creation of high quality educational content and the implementation of comprehensive training programs.
      Browse through our site to discover our different training courses and do not hesitate to contact us if you have any questions or if you wish to register for one of our programs.
    
      
    </p>
</a>
</div> 
  

 
</div>
 <!-- Second Div: Image  -->
 <div class="ml-24 " style="margin-top:0px;margin-left:54%">
    <img src="{{ asset('image/ph.jpg') }}" alt="Image" style="width:500px">
  </div> 


  <!--Footer-->
 <div class="w-full pt-16 pb-6 text-sm text-center md:text-left fade-in">
          <a class="text-gray-500 no-underline hover:no-underline" href="#">&copy; 2023</a>
          
        </div>
    
</body>
</html>