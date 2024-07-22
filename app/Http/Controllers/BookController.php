<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view("books.index", compact("books"));
    }

    public function create()
    {
        return view("books.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "author" => "required",
            "year" => "required|integer"
        ], [
            "title.required" => "Le titre est obligatoire",
            "author.required" => "L'auteur est obligatoire",
            "year.required" => "L'année est obligatoire",
            "year.integer" => "L'année doit être un nombre entier"
        ]);

        try {
            Book::create($request->all());
        } catch (QueryException $e) {
            return redirect()->route("books.create")->with("error", "Une erreur est survenue lors de la création du livre");
        }

        return redirect()->route("books.index")->with("success", "Le livre a été ajouté avec succès !");
    }

    
    public function edit($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return redirect()->route("books.index")->with("error", "Le livre que vous cherchez à modifier n'existe pas");
        }

        return view("books.edit", compact("book"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required",
            "author" => "required",
            "year" => "required|integer"
        ], [
            "title.required" => "Le titre est obligatoire",
            "author.required" => "L'auteur est obligatoire",
            "year.required" => "L'année est obligatoire",
            "year.integer" => "L'année doit être un nombre entier"
        ]);

        try {
            $book = Book::find($id);
            $book->update($request->all());
        } catch (QueryException $e) {
            return redirect()->route("books.edit", $id)->with("error", "Une erreur est survenue lors de la modification du livre");
        }

        return redirect()->route("books.index")->with("success", "Le livre a été modifié avec succès !");
    }

    public function destroy($id)
    {
        try {
            $book = Book::find($id);
            $book->delete();
        } catch (QueryException $e) {
            return redirect()->route("books.index")->with("error", "Une erreur est survenue lors de la suppression du livre");
        }

        return redirect()->route("books.index")->with("success", "Le livre a été supprimé avec succès !");
    }
}