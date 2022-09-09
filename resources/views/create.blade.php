@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <h2 class="text-center">Создать заметку</h2>
            <form action="{{ route('store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input id="title" class="form-control" type="text" name="title" value="{{ old('title') }}">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Текст</label>
                    <textarea id="text" class="form-control" name="text" cols="30" rows="10">{{ old('text') }}</textarea>
                    @error('text')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button class="btn btn-success" type="submit">Создать</button>
                <a href="{{ route('index') }}" class="btn btn-danger">Отмена</a>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
@endsection
