<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $page = 1;
    public $selected_category_id;

    public function render()
    {
        $categories = Category::orderBy('id', 'ASC')->paginate(5, ['*'], 'page', $this->page);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }
    
    public function editCategory(Category $category)
    {
        $this->selected_category_id = $category->id;
        return redirect()->route('category.edit', ['category' => $this->selected_category_id]);
    }
    
}
