<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>{{$user ? "Список вопросов пользователя с ID ".$user->id : "Неверный ID пользователя"}}</h2>
    @if($user)
    <table border="1">
        <thead>
            <td>id</td>
            <td>title</td>
            <td>content</td>
            <td>isSolved</td>
        </thead>
    @foreach($user->questions as $question)
        <tr>
            <td>{{$question->id}}</td>
            <td>{{$question->title}}</td>
            <td>{{$question->content}}</td>
            <td>{{$question->isSolved}}</td>
        </tr>
    @endforeach

    </table>
    @endif
</body>
</html>
