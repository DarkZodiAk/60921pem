<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>Список тегов</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>name</td>
        </thead>
    @foreach($tags as $tag)
        <tr>
            <td>{{$tag->id}}</td>
            <td>{{$tag->name}}</td>
        </tr>
    @endforeach

    </table>
</body>
</html>
