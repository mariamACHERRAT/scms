


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
<x-app-layout>


<div class="overflow-hidden" style="margin-left:8%;margin-top:40px;">
  <table class="w-[70rem] text-left text-sm font-light">
    <thead class="border-b font-medium dark:border-neutral-500">
      <tr>
        <th scope="col" class="px-6 py-4">Student Name</th>
        <th scope="col" class="px-6 py-4">Group</th>
       
        <th scope="col" class="px-6 py-4">Refuse</th>
      </tr>
    </thead>


    <tbody>
      
      @for ($i=0; $i< count($confirmedStudents) ; $i++)


      <tr class="border-b dark:border-neutral-500">
        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $confirmedStudents[$i]["name"] }}</td>
        <td class="whitespace-nowrap px-6 py-4">{{  $confirmedStudents[$i]["class"] }}</td>
    
        
     
        <td class="whitespace-nowrap px-6 py-4">
       
        <form action="{{ route('delete-student', ['request_id' => $confirmedStudents[$i]['id']]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
</form>
        
            
        </td> 
      </tr>
   
    @endfor
    </tbody>
  </table>
</div>


</x-app-layout>
</body>
</html>