<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>
<x-app-layout>

<div class="flex justify-center items-center h-screen ">
    <div class="bg-white shadow-gray-500 rounded p-4 " style="max-width:50%;">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">{{ $section->title }}</h5>

        <div id="contentFields">
            @if ($section->type === 'text')
                <div id="contentField" class="mb-4">
                  {!!$section->content!!}
                </div>
            @elseif ($section->type === 'video')
                <div id="videoField" class="mb-4">
                    <iframe width="560" height="315" src="{{ $section->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            @elseif ($section->type === 'task')
                <div id="taskField" class="mb-4">
                {!! $section->description !!}
                </div>
                <?php $user =Auth::user()?>
                     @if ($user->is_etudiant)
                     <div class="mb-4">
                        <label class="block">Content</label>
                             <textarea name="content" class="ckeditor"></textarea>
                     </div>
                     <a style="margin-left:80%"href="" class="focus:outline-none text-white bg-green-600 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-800">Send</a>

                     @endif
            @endif
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('.ckeditor').ckeditor();
    });
  </script>
</x-app-layout>
</body>
</html>
