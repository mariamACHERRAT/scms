<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $course->title }}</h1>

    <h3>Descripltion De Course</h3>
    <p>{{ $course->content }}</p>
   
  
    
        @foreach($course->sections as $section)
    
            <h2>{{ $section->title }}</h2>
            <h4>{!! $section->content !!}</h4>
            <h4> {!! $section->description !!}</h4>
     
        @endforeach
    </table>
  
</body>
</html