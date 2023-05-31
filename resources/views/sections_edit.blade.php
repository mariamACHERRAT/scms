<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Section</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<x-app-layout>
    <form method="POST" action="{{ route('sections.update', $section->id) }}" class="p-10 mt-10 mx-auto max-w-lg border-solid border-2 border-gray-400" style="border-radius: 10px;" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block font-medium mb-2 text-blue-600">Titre de la section</label>
            <input type="text" name="title" required class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $section->title }}">
        </div>

        <div class="mb-4">
            <input type="hidden" name="type" value="{{ $section->type }}">
            @if($section->type == "text")
                <div id="contentField" class="mb-4">
                    <label for="content" class="block font-medium mb-2">Contenu *</label>
                    <textarea name="content" id="editor" class="ckeditor border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">{!! $section->content !!}</textarea>
                </div>
            @elseif($section->type == 'video')
                <div id="videoField" class="mb-4">
                    <label for="video_url" class="block font-medium mb-2">URL de la vidéo *</label>
                    <input type="url" name="video_link" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $section->video_link }}">
                </div>
            @elseif($section->type == 'task')
                <div id="taskField" class="mb-4">
                    <label for="task_description" class="block font-medium mb-2">Description de la tâche</label>
                    <textarea name="description" class="ckeditor border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $section->description }}</textarea>
                    <!-- Add any additional fields for the task, such as a deadline date -->
                </div>
                @elseif($section->type == 'test')
                <!-- Code for test type -->
                <h4 class="text-fuchsia-500">Your Test Content</h4>
                @foreach ($section->questions as $question)
                    <div class="mb-4">
                        <label for="question[{{ $question->id }}][question]" class="block font-medium mb-2">Question</label>
                        <input type="text" name="questions[{{ $question->id }}][question]" required class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $question->question }}">
                    </div>
                    <div class="mb-4">
                        <label for="question[{{ $question->id }}][answer_type]" class="block font-medium mb-2">Answer Type</label>
                        <select name="questions[{{ $question->id }}][answer_type]" required class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="single" {{ $question->answer_type === 'single' ? 'selected' : '' }}>Single Choice</option>
                            <option value="multiple" {{ $question->answer_type === 'multiple' ? 'selected' : '' }}>Multiple Choice</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <p class="block font-medium mb-2">Choices</p>
                        @foreach ($question->choices as $choice)
                            <div class="mr-4">
                                <input type="text" name="questions[{{ $question->id }}][choices][{{ $choice->id }}]" required class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $choice->choice }}">
                                <input type="checkbox" id="is_correct_{{ $choice->id }}" name="questions[{{ $question->id }}][is_correct][]" value="{{ $choice->id }}" {{ $choice->is_correct ? 'checked' : '' }}>
                                <label for="is_correct_{{ $choice->id }}">Correct</label>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                @endforeach
            @endif
        </div>

        <button type="submit" class="bg-emerald-700 text-white rounded-md px-4 py-2 hover:bg-blue-600 focus:outline-none">Update</button>
    </form>

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
