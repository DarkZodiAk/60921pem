<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
    <style> .is-invalid { color: red; } </style>
</head>
<body>
    <h2>Создание вопроса</h2>
    <form method="post" action={{url('question')}}>
        @csrf
        <label>Заголовок</label>
        <input type="text" name="title" value="{{ old('title') }}"/>
        @error('title')
        <div class="is-invalid">{{ $message }}</div>
        @enderror

        <br><br>

        <label>Описание</label>
        <textarea name="content">{{ old('content') }}</textarea>
        @error('content')
        <div class="is-invalid">{{ $message }}</div>
        @enderror

        <br><br>

        <label>Пользователь</label>
        <select name="user_id" value="{{ old('user_id') }}">
            <option style="display:none">
            @foreach($users as $user)
                <option value="{{$user->id}}" @if(old('user_id') == $user->id) selected @endif>
                    {{$user->name}}
                </option>
            @endforeach
        </select>
        @error('user_id')
        <div class="is-invalid">{{ $message }}</div>
        @enderror

        <br><br>

        <input type="submit">
    </form>
</body>
</html>
