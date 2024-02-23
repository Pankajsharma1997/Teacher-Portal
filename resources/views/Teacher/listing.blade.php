<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher list </title>
</head>
<body>
     <table>
        
        <th> Name </th>
        <th>Skills </th>
        <th> Experience </th>
        
        <tr> 
    <!-- Display filtered teachers -->
        @if($teachers->count() > 0)
            <ul>
                @foreach($teachers as $teacher)
                    <li>{{ $teacher->name }} - Skills: {{ $teacher->skills }}, Experience: {{ $teacher->experience }} years</li>
                @endforeach
            </ul>
        </tr>
        @else
            <p>No teachers found.</p>
        @endif

    </table>
    
</body>
</html