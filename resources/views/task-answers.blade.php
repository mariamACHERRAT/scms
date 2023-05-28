<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Answers</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<x-app-layout>


<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center" style="margin-top:14px">{{ $section->title }}</h5>
        
        
<div class="flex justify-center items-center h-screen">
    <div>
        
        @if ($taskAnswers->count() > 0)
            <ul class="flex flex-wrap justify-center">
                @foreach ($taskAnswers as $taskAnswer)
                    <li>
                        <div class="m-8 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <p class="text-center mb-2 text-base font-bold tracking-tight text-gray-900 dark:text-white">{{ $taskAnswer->user->name }}</p>
                            <p class="text-center mb-2 text-base font-bold tracking-tight text-purple-500 dark:text-white">{{ $taskAnswer->user->class }}</p>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{!! $taskAnswer->task_answer !!}</p>
                            <a href="{{ asset('images/' . $taskAnswer->answer_file) }}">{{ $taskAnswer->answer_file }}</a>
                            <div class="mt-4">
                            @if (!$taskAnswer->point)
                                <form action="{{ route('send-score', ['taskAnswerId' => $taskAnswer->id]) }}" method="POST">
                                    @csrf
                                    <div>
                                        <label for="point" class="block text-sm font-medium text-gray-700 dark:text-gray-400">point:</label>
                                        <input id="point" name="point" type="number" min="0" max="100" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    </div>
                                    <div class="mt-4">
                                        <label for="Note" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Note</label>
                                        <textarea id="note" name="note" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="px-4 py-2 bg-fuchsia-700 text-white rounded hover:bg-indigo-600">Send</button>
                                    </div>
                                </form>
                                @endif
                                <div id="answer">
    
    @if ($taskAnswer)
    <h4 class="text-red-500">The Answer</h4>
    <p>{!!$taskAnswer->task_answer!!}</p>
    <h4 class="text-red-500">The  Point</h4>
    @if ($taskAnswer->point !== null)
            <p>Point: {{$taskAnswer->point}}</p>
        @endif
        <p>{{$taskAnswer->note}}</p>
       
   
    @endif
    <hr>
</div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No task answers available.</p>
        @endif
    </div>
</div>

</x-app-layout>
</body>
</html>
