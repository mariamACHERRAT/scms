<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Result</title>
    @vite('resources/css/app.css')
</head>
<body>

<x-app-layout>
    <div class="p-10">
        <h2 class="text-2xl font-bold mb-4">Test Result</h2>

        <div class="bg-white shadow-md rounded-lg p-6">
            <p class="text-lg">Your score: <span class="{{ $result->score >= 10 ? 'text-green-600' : 'text-red-600' }}">{{ $result->score }}/20</span></p>
            <p class="text-gray-500">Section: {{ $section->title }}</p>
            <!-- Additional details or information you want to display -->

            <!-- Other result details and content -->
        </div>
    </div>
</x-app-layout>

</body>
</html>
