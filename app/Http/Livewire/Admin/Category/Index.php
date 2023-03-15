<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $page = 1;
    public $selected_category_id;
    public $category_id;

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

    public function destroyCategory($category_id)
    {

        $this->category_id = $category_id;
        
        $category = Category::find($this->category_id);
        $path = 'uploads/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        session()->flash('message', 'Category Deleted');
    }
    
}
