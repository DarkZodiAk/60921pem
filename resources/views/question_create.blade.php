@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-4">
    <form method="post" action="{{ url('item') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                   id="title" name="title" aria-describedby="titleHelp" value="{{ old('title') }}">
            <div id="titleHelp" class="form-text">Введите заголовок вопроса</div>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Описание</label>
            <input type="text" class="form-control @error('content') is-invalid @enderror"
                   id="content" name="content" aria-describedby="contentHelp" value="{{ old('content') }}">
            <div id="contentHelp" class="form-text">Опишите вопрос подробнее</div>
            @error('content')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="user" class="form-label">Автор вопроса</label>
            <select class="form-select" id="user" name="user_id" aria-describedby="userHelp" value="{{ old('user_id') }}">
                <option style=""></option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if(old('user_id') == $user->id) selected @endif>
                        {{$user->name}}
                    </option>
                @endforeach
            </select>
            <div id="userHelp" class="form-text">Выберите автора вопроса</div>
            @error('user_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
    </div>
</div>
@endsection

