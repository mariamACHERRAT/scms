<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  
<form method="POST" action="{{ route('sections.store') }}" class="p-10 mt-10 mx-auto max-w-lg border-solid border-2 border-gray-400 " style="border-redius:10px;">
    @csrf
    <div class="mb-4">
        <label for="title" class="block font-medium mb-2">Titre de la section</label>
        <input type="text" name="title" required class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="mb-4">
        <label for="type" class="block font-medium mb-2">Type de contenu</label>
        <select name="type" required onchange="showContent(this.value)" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Sélectionnez un type</option>
            <option value="text">Texte</option>
            <option value="video">Vidéo</option>
            <option value="task">Tâche</option>
        </select>
    </div>

    <div id="contentField" style="display: none;" class="mb-4">
        <label for="content" class="block font-medium mb-2">Contenu</label>
        <textarea name="content" required class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
    </div>

    <div id="videoField" style="display: none;" class="mb-4">
        <label for="video_url" class="block font-medium mb-2">URL de la vidéo</label>
        <input type="url" name="video_url" required class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div id="taskField" style="display: none;" class="mb-4">
        <label for="task_description" class="block font-medium mb-2">Description de la tâche</label>
        <textarea name="task_description" required class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        <!-- ajouter ici les champs pour la tâche, par exemple une date d'échéance -->
    </div>

    <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Ajouter la section</button>
</form>


<script>
    function showContent(value) {
        document.getElementById("contentField").style.display = "none";
        document.getElementById("videoField").style.display = "none";
        document.getElementById("taskField").style.display = "none";

        if (value == "text") {
            document.getElementById("contentField").style.display = "block";
        } else if (value == "video") {
            document.getElementById("videoField").style.display = "block";
        } else if (value == "task") {
            document.getElementById("taskField").style.display = "block";
        }
    }
</script>

</body>
</html>

