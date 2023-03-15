<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('admin.books.index');
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

            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().'.'.$extension;
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

}
