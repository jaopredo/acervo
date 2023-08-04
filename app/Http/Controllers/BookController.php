<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookController extends Controller
{
    public function index(Request $request) {
        $search = request('search');
        $items = '';

        if ($search) {
            $books = Book::where([
                ['name', 'like', '%'.$search.'%']
            ])->get();

            return view('books/index', ['books' => $books, 'search' => $search]);
        }

        if ($request->ajax()) {
            $books = Book::orderBy('id')->paginate(10);
            // <div class="delete-selector-container">
            //             <input type="checkbox" name="booksDelete[]" name="'. $book->id .'" >
            //         </div>
            foreach ($books as $book) {
                $items = $items.'<div class="card item book-card">
                    <div class="card-header">
                        <h2 class="card-title"><a href="/books/'.$book->id.'">'.$book->name.'</a></h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Registro:'.$book->register.'</p>
                        <p class="card-text">Autor: '.$book->author.'</p>
                        <p class="card-text">Páginas:'.$book->pages.'</p>
                    </div>
                </div>
                ';
            }
            return $items;
        }

        return view('books/index', ['search'=>false]);
    }

    public function create() {
        // Book::factory()->count(50)->create();
        return view('books/create');
    }

    public function show($id) {
        $book = Book::findOrFail($id);

        return view('books/show', ['book'=>$book]);
    }

    public function edit($id) {
        $book = Book::findOrFail($id);

        return view('books/edit', ['book'=>$book]);
    }

    /* ROTAS DE INTERAÇÃO COM O BANCO DE DADOS */
    public function store(Request $request) {

        $book = new Book();

        $book->register = $request->register;
        $book->cdd = $request->cdd;
        $book->isbn = $request->isbn;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->publication = $request->publication;
        $book->editor = $request->editor;
        $book->pages = $request->pages;
        $book->volume = $request->volume;
        $book->example = $request->example;
        $book->aquisition_year = $request->aquisition_year;
        $book->aquisition = $request->aquisition;
        $book->local = $request->local;

        /* FALTA COLOCAR O ID DO GRUPO E O PATH DA IMAGEM (NÃO FAZ UPLOAD) */

        $book->save();

        return redirect('books')->with('msg', 'LIVRO CRIADO COM SUCESSO!');
    }

    public function update(Request $request) {
        $data = $request->all();

        Book::findOrFail($request->id)->update($data);

        return redirect('books/'.$request->id);
    }

    public function destroy($id) {
        Book::findOrFail($id)->delete();

        return redirect('/books')->with('msg', 'LIVRO DELETADO COM SUCESSO');
    }
}
