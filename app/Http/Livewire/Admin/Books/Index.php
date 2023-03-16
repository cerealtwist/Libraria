<?php

namespace App\Http\Livewire\Admin\Books;

use App\Models\Book;
use App\Models\Category;
use Livewire\Component;

class Index extends Component
{

    public $selected_book_id;

    public function render()
    {
        $books = Book::all();
        $categories = Category::all();
        return view('livewire.admin.books.index', compact('books', 'categories'));
    }

    public function editBook(Book $books)
    {
        $this->selected_book_id = $books->id;
        return redirect()->route('books.edit', ['book' => $this->selected_book_id]);
    }



}
