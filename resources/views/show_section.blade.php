<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
    .hidden {
        display: none;
    }
</style>
</head>
<body>
<x-app-layout>

<div class="h-screen" style="margin-top:40px;margin-left:18%">

    <div class="bg-white shadow-gray-500 rounded p-4" style="max-width: 80%;min-width:60%;margin-top:1px">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">{{ $section->title }}</h5>

   
    @if ($section->type === 'test')
    <!-- Display the content of the test -->
    <?php $user =Auth::user()?>
    @if ($user->is_prof)
    <h4 class="text-fuchsia-500">Test Content</h4>
    <!-- Add your code here to display the content of the test -->
    <!-- For example, you can iterate over the questions and choices and display them -->
    <form method="post" action="{{ route('tests.submit', $section) }}">
    @csrf
    @foreach ($section->questions as $question)
        <p style="font-size:18px;margin-top:10px;margin-bottom:10px">{{ $question->question }}</p>
        <div class="flex">
            @foreach ($question->choices as $choice)
                <div class="mr-4">
                    <input type="checkbox" id="{{ $choice->id }}" name="answers[{{ $question->id }}][]" value="{{ $choice->id }}">
                    <label for="{{ $choice->id }}">{{ $choice->choice }}</label>
                </div>
            @endforeach
        </div>
        <hr>
    @endforeach
    <button type="submit"   class="inline-block bg-fuchsia-600  focus:outline-none focus:ring-4 text-white font-medium rounded-lg text-sm px-5 py-2.5 mt-2 " >Submit</button>
</form>


@endif

    @endif

    @if(session('score'))
    <p>Score: {{ session('score') }}/20</p>
    @endif








    


        @if ($section->type === 'task')
            <div id="taskField" class="mb-4">
                <?php $user =Auth::user()?>
                @if ($user->is_prof)
                    <span class="notification-count" style="max-height: 20px; width:20px;margin-left:98%;background-color: red;padding:4px;border-radius: 80%;padding-left:7px;padding-right:7px;color:white">{{ $section->taskAnswers()->count() }}</span>
                    <a href="{{ route('task-answers', ['sectionId' => $section->id]) }}">
                        <img src="{{ asset('image/notification.png') }}" class="w-20" alt="Notification Icon" style="max-height: 20px; width:20px; margin-left: 97%">
                    </a>
                @endif   
            @endif


            <div id="contentFields">
                @if ($section->type === 'text')
                    <div id="contentField" class="mb-4">
                        {!! $section->content !!}
                    </div>
                @elseif ($section->type === 'video')
                    <div id="videoField" class="mb-4" style="margin-left:15%">
                        <iframe width="560" height="315" src="{{ $section->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                @elseif ($section->type === 'task')
                    <div id="taskField" class="mb-4">
                    <h4 class="text-red-500">The Exercice </h4>
                        {!! $section->description !!}
                        <a href="{{ asset('images/' . $section->section_file) }}">{{ $section->section_file }}</a>

                    </div>
                    <?php $user =Auth::user()?>
                    @if ($user->is_etudiant &&(!$taskAnswer))
                    <form id="answerForm" action="{{ route('send-task-answer', ['userName' => Auth::user()->name, 'sectionId' => $section->id]) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                     <div class="mb-4">
                        <textarea id="answerContent" name="task_answer" class="ckeditor"></textarea>

                  <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image du produit</label>
                 <input type="file" style="display: none;" id="imageInput" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" name="image">
                 <img src="{{ asset('image/addfile.png') }}" style="border-radius:50%;width:70px;cursor:pointer;" alt="Course Image" onclick="document.getElementById('imageInput').click();">
                     <p id="uploadStatus"></p>
                </div>
                <button id="submitButton" class="focus:outline-none text-white bg-fuchsia-700  focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 " type="submit">Send</button>
        
                </form>
    
    
@endif
<div id="answer">
    
    @if ($taskAnswer)
    <h4 class="text-red-500">Your Answer</h4>
    <p>{!!$taskAnswer->task_answer!!}</p>
    <h4 class="text-red-500">Your Point</h4>
    @if ($taskAnswer->point !== null)
            <p>Point: {{$taskAnswer->point}}</p>
        @endif
        <p>{{$taskAnswer->note}}</p>
       
   
    @endif
    <hr>
</div>

                @endif
            </div>
     

        </div>
    </div>
    
</div>



<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();

        // Check if the student has sent the answer
      
    });
</script>


</x-app-layout>
</body>
</html>
