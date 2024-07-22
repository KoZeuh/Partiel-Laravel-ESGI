@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <a href="{{ route('books.index') }}" class="btn btn-primary">Afficher la liste des livres</a>
    </div>
@endsection