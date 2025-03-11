@extends('layout')
@section('content')
    @parent
    <div class="container">
        <h2 class="m-3">Список вопросов</h2>
        <table class="table m-3">
            <thead>
            <td>ID вопроса</td>
            <td>ID юзера</td>
            <td>Заголовок</td>
            <td>Описание</td>
            <td>Решен?</td>
            <td>Действия</td>
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

        <div class="d-flex flex-column align-items-center mt-4">
            {{ $questions->links() }}
        </div>
    </div>
@endsection
