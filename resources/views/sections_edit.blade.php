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
  
<form method="POST" action="{{ route('sections.update', $section->id) }}" class="p-10 mt-10 mx-auto max-w-lg border-solid border-2 border-gray-400 " style="border-radius:10px;" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="title" class="block font-medium mb-2">Titre de la section</label>
        <input type="text" name="title" required class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $section->title }}">
    </div>

    <div class="mb-4">
        <input type="hidden" name="type" value="{{ $section->type }}">
        @if($section->type == 'text')
            <div id="contentField" class="mb-4">
                <label for="content" class="block font-medium mb-2">Contenu *</label>
                <textarea name="content" id="editor"  class="ckeditor border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $section->content }}</textarea>
            </div>
        @elseif($section->type == 'video')
            <div id="videoField" class="mb-4">
                <label for="video_url" class="block font-medium mb-2">URL de la vidéo *</label>
                <input type="url" name="video_link" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $section->video_link }}">
            </div>
        @elseif($section->type == 'task')
            <div id="taskField" class="mb-4">
                <label for="task_description" class="block font-medium mb-2">Description de la tâche</label>
                <textarea name="description"  class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $section->description }}</textarea>
                <!-- ajouter ici les champs pour la tâche, par exemple une date d'échéance -->
            </div>
        @endif
    </div>
    <script>
    function showContent(value) {
        document.getElementById("contentField").style.display = "none";
        document.getElementById("videoField").style.display = "none";
        document.getElementById("taskField").style.display = "none";

        if (value == "text") {
            document.getElementById("contentField").style.display = "block";
            document.getElementById("video_link").value = "";
            document.getElementById("description").value = "";
        } else if (value == "video") {
            document.getElementById("videoField").style.display = "block";
            document.getElementById("editor").value = "";
            document.getElementById("description").value = "";
        } else if (value == "task") {
            document.getElementById("taskField").style.display = "block";
            document.getElementById("editor").value = "";
            document.getElementById("video_link").value = "";
        }
    }

    // Set initial state of the form based on the section type
    var sectionType = "{{ $section->type }}";
    showContent(sectionType);
</script>


    <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600 focus:outline-none">Update</button>