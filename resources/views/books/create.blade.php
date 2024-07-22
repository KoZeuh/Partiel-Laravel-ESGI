@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Ajout d'un livre</h1>
                <form method="POST" action="/books">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" id="title" name="title">

                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="author">Auteur</label>
                        <input type="text" class="form-control" id="author" name="author">

                        @error('author')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="year">Année de sortie</label>
                        <input type="number" class="form-control" id="year" name="year">

                        @error('year')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="genre">Genre</label>
                        <input type="text" class="form-control" id="genre" name="genre">

                        <input type="submit" class="btn btn-primary mt-3" value="Ajouter">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection