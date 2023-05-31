<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<x-app-layout>
<div class="overflow-hidden" style="margin-left:8%;margin-top:40px;">
  <table class="w-[70rem] text-left text-sm font-light">
    <thead class="border-b font-medium dark:border-neutral-500">
      <tr>
        <th scope="col" class="px-6 py-4">Student Name</th>
        <th scope="col" class="px-6 py-4">Group</th>
        <th scope="col" class="px-6 py-4">Lesson Name</th>
        <th scope="col" class="px-6 py-4">Confirm</th>
        <th scope="col" class="px-6 py-4">Refuse</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($requests as $request)
      <tr class="border-b dark:border-neutral-500">
        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $request->user->name }}</td>
        <td class="whitespace-nowrap px-6 py-4">{{ $request->user->class }}</td>
        <td class="whitespace-nowrap px-6 py-4">{{ $request->course->title }}</td>
        
        <td class="whitespace-nowrap px-6 py-4">
            <a href="{{ route('confirm-request', ['request' => $request->id]) }}">
            <img style="max-width:30px" src="{{ asset('images/confirm.png') }}" alt="">
            </a>
        </td>
       <a> <td class="whitespace-nowrap px-6 py-4"><img style="max-width:30px" src="{{ asset('images/refuse.png') }}" alt=""></td> </a>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
</x-app-layout>
</body>
</html>
