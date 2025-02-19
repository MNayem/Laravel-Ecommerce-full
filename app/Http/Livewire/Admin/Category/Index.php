<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function deleteCategory($category_id){
        $this->category_id = $category_id;
    }

    public function destroyCategory(){
        $deleteCategory = Category::find($this->category_id);
        $path = 'uploads/categories'.$deleteCategory->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $deleteCategory->delete();
            session()->flash('message','Category Deleted Successfully!');
            return redirect()->to('/category');
            $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $categories = Category::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.category.index',['categories' => $categories]);
    }
}
