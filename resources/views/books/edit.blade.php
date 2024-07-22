@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Modification d'un livre</h1>

                <form method="POST" action="/books/{{ $book->id }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $book }}">

                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="author">Auteur</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">

                        @error('author')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="year">Année de sortie</label>
                        <input type="number" class="form-control" id="year" name="year" value="{{ $book->year }}">

                        @error('year')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="genre">Genre</label>
                        <input type="text" class="form-control" id="genre" name="genre" value="{{ $book->genre }}">

                        @error('genre')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <input type="submit" class="btn btn-primary mt-3" value="Sauvegarder les modifications">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection