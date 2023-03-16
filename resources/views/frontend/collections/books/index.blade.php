@extends('layouts.app')

@section('title', 'All Categories')

@section('content')

<section>
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
      <header>
        <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">
          {{ $category->name }} Collection
        </h2>
  
        <p class="mt-4 max-w-md text-gray-500">
          {{$category->desc}}
        </p>
      </header>
  
      <div class="mt-8 flex items-center justify-between">
        <div class="flex divide-x divide-gray-100 rounded border border-gray-100">
          <button
            class="inline-flex h-10 w-10 items-center justify-center text-gray-600 transition hover:bg-gray-50 hover:text-gray-700"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="h-5 w-5"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"
              />
            </svg>
          </button>
  
          <button
            class="inline-flex h-10 w-10 items-center justify-center text-gray-600 transition hover:bg-gray-50 hover:text-gray-700"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="h-5 w-5"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5"
              />
            </svg>
          </button>
        </div>
  
        <div>
          <label for="SortBy" class="sr-only">SortBy</label>
  
          <select id="SortBy" class="h-10 rounded border-gray-300 text-sm">
            <option>Sort By</option>
          </select>
        </div>
      </div>
  
      <ul class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @forelse ($books as $bookItem)
        <li>
          <a href="{{ url('/collections/'.$bookItem->category->slug.'/'.$bookItem->name) }}" class="group block overflow-hidden">
            @if ($bookItem->bookImages->count() > 0)
            <img
              src="{{asset($bookItem->bookImages[0]->image)}}"
              alt=""
              class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]"
            />
            @endif
  
            <div class="relative bg-white pt-3">
              <h3
                class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4"
              >
                {{ $category->name }}
              </h3>
  
              <p class="mt-2">
                <span class="sr-only"> Regular Price </span>
  
                <span class="tracking-wider text-gray-900"> {{ $bookItem->name }} </span>
              </p>
            </div>
          </a>
        </li>
        @empty
            <div>
                <h5>No Books Available.</h5>
            </div>
        @endforelse
      </ul>
    </div>
  </section>

@endsection