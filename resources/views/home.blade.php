@extends('layouts.base')

@section('content')
    <h1 class="text-center">Заметки</h1>
    <div class="text-center my-4">
        <a href="{{ route('create') }}" class="btn btn-success">+ Добавить заметку</a>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="col-3"></div>
    </div>
    <div class="row">
        @forelse ($notes as $note)
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $note->title }}</h5>
                    <p class="card-text">
                        {{ $note->text }}
                    </p>
                    <form action="{{ route('delete_note', $note->id) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                </div>
            </div>
        @empty
            <h5 class="text-center">Заметок нет.</h5>
        @endforelse
    </div>
@endsection
