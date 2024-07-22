@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <h1>Liste des livres</h1>
                
                <div class="row">
                    @foreach($books as $book)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $book }} - {{ $book->year }}</h5>

                                    @if ($book->genre)
                                        <p class="card-text">Genre : {{ $book->genre }}</p>
                                    @endif

                                    <p class="card-text">Auteur : {{ $book->author }}</p>
                                    <a href="/books/{{ $book->id }}/edit" class="btn btn-primary">Modifier</a>

                                    <form style="display:inline" method="POST" action="/books/{{ $book->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <a href="{{ route('books.create') }}" class="btn btn-success">Ajouter un livre</a>
            </div>
        </div>
    </div>
@endsection