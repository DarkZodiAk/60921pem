<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>{{$question ? "Список тегов вопроса с ID ".$question->id : "Неверный ID вопроса"}}</h2>
    @if($question)
    <table border="1">
        <thead>
            <td>id</td>
            <td>name</td>
        </thead>
    @foreach($question->tags as $tag)
        <tr>
            <td>{{$tag->id}}</td>
            <td>{{$tag->name}}</td>
        </tr>
    @endforeach

    </table>
    @endif
</body>
</html>
