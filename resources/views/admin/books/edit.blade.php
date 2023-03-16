@extends('layouts.admin')

@section('content')

<!-- Book Modal -->
<div class="container mx-auto grid">
    <h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Edit Book
    </h4>
    <!-- Modal -->
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <!-- Modal body -->
      <div>
        <!-- Modal Forms -->
        <form action="{{ url('admin/books/'.$book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="pt-4">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Name</span>
              <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
              type="text"
              name="name"
              value="{{ $book->name }}"
              placeholder="Book Name">
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Author</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text"
                value="{{ $book->author }}"
                name="author">
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Category
                </span>
                <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" multiple="" name="category_id">
                  @foreach ($categories as $category)  
                  <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected':''}}>{{ $category->name }}</option>
                  @endforeach
                </select>
              </label>

            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Description</span>
              <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Enter some long form content."
              name="desc">{{ $book->desc }}</textarea>
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Date of Issue</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text"
                value="{{ $book->date_of_issue }}"
                name="date_of_issue">
            </label>

            <label class="block mt-4 text-sm font-medium text-gray-900 dark:text-white" for="file_input">
                <span class="text-gray-700 dark:text-gray-400">Image</span>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="image">
                @if($book->bookImages)
                    @foreach ($book->bookImages as $image)
                        <img src="{{ asset('$image->image') }}" style="width: 80px; height: 80px;" class="me-4" alt="">
                    @endforeach
                @else
                <h5>No Image.</h5>
                @endif
            </label>
            
            <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Book Status
                </span>
                <div class="mt-2">
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                    <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="booksActive" value="personal" {{ $book->status == '0' ? 'checked':'' }}>
                    <span class="ml-2">Published</span>
                  </label>
                </div>
            </div>
        </div>
        <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row ">
            <button class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
            Cancel
            </button>
            <button class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            type="submit">
            Update
            </button>
        </footer>
        </form>
    </div>
</div>

@endsection