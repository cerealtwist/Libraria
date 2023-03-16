<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookFormRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();
        return view('admin.books.index', compact('books', 'categories'));
    }
    

    public function store(BookFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);

        $book = $category->books()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'author' => $validatedData['author'],
            'desc' => $validatedData['desc'],
            'date_of_issue' => $validatedData['date_of_issue'],
            'status' => $request->status == true ? '1':'0',
        ]);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/books/';

            $i = 1;
            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.'-'.$filename;

                $book->bookImages()->create([
                    'book_id' => $book->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }


        return redirect('/admin/books')->with('message','Book Added Successfully.');
    }

    public function edit(int $book_id)
    {
        $categories = Category::all();
        $book = Book::findOrFail($book_id);
        return view('admin.books.edit', compact('categories','book'));
    }

    public function update(BookFormRequest $request, int $book_id)
    {
        $validatedData = $request->validated();
        
        $book = Category::findOrFail($validatedData['category_id'])
                        ->books()->where('id', $book_id)->first();
        if($book)
        {
            $book->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'author' => $validatedData['author'],
                'desc' => $validatedData['desc'],
                'date_of_issue' => $validatedData['date_of_issue'],
                'status' => $request->status == true ? '1':'0',
            ]);

            if($request->hasFile('image')){
                $uploadPath = 'uploads/books/';
    
                $i = 1;
                foreach($request->file('image') as $imageFile){
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extension;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath.'-'.$filename;
    
                    $book->bookImages()->create([
                        'book_id' => $book->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
    
    
            return redirect('/admin/books')->with('message','Book Updated Successfully.');
        }
        else
        {
            return redirect('/admin/books')->with('message', 'Book Id Not Found');
        }
    }



}
