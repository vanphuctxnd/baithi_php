<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index() {

        $books = Book::paginate(5);
        return view('index', compact('books'));

    }


    public function timkiem() {
        if($_GET['key'] != '') {
            $key = $_GET['key'];
            $books = Book::where('title', 'like', '%'.$key.'%')->get();
            return view('index', compact('books'));

        }
    }

    public function create(){
        return view('create');
    }
    public function store(Request $request) {

        Book::create($request->all());
        return redirect()->route('index')->with('success', 'Product successfully create.');

    }
}
