<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>Список вопросов</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>user_id</td>
            <td>title</td>
            <td>content</td>
            <td>is_solved</td>
            <td>Actions</td>
        </thead>
    @foreach($questions as $question)
        <tr>
            <td>{{$question->id}}</td>
            <td>{{$question->user_id}}</td>
            <td>{{$question->title}}</td>
            <td>{{$question->content}}</td>
            <td>{{$question->is_solved}}</td>
            <td>
                <a href="{{url('question/destroy/'.$question->id)}}">Удалить</a>
                <a href="{{url('question/edit/'.$question->id)}}">Редактировать</a>
            </td>
        </tr>
    @endforeach
    </table>
    {{ $questions->links() }}
</body>
</html>
