<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }

    /* Create Category */

    public function createCategory(){
        return view('admin.category.create');
    }
    /* Category Store */

    public function categoryStore(CategoryFormRequest $request){
        $validatedData = $request->validated();

        $category = new Category;
        $category->name  = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description  = $validatedData['description'];

        $uploadPath = 'uploads/categories/';

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/categories',$filename);

            $category->image  = $uploadPath.$filename;
        }

        $category->meta_title  = $validatedData['meta_title'];
        $category->meta_keyword  = $validatedData['meta_keyword'];
        $category->meta_description  = $validatedData['meta_description'];

        $category->status  = $request->status == true ? '1':'0';

        $category->save();
        return redirect()->to('category')->with('message','Category Added Successfully!!!');
    }

    /* Edit Category */

    public function categryEdit($id){
        $editCategory = Category::find($id);
        return view('admin.category.edit', compact('editCategory'));
    }
    public function categryEditProcess(CategoryFormRequest $request, $id){
        $validatedData = $request->validated();

        $editCategory = Category::findOrFail($id);
        $editCategory->name  = $validatedData['name'];
        $editCategory->slug = Str::slug($validatedData['slug']);
        $editCategory->description  = $validatedData['description'];

        if($request->hasFile('image')){

            $uploadPath = 'uploads/categories/';

            $path = 'uploads/categories'.$editCategory->image;
            if(File::exists($path)){
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/categories',$filename);

            $editCategory->image  = $uploadPath.$filename;
        }

        $editCategory->meta_title  = $validatedData['meta_title'];
        $editCategory->meta_keyword  = $validatedData['meta_keyword'];
        $editCategory->meta_description  = $validatedData['meta_description'];

        $editCategory->status  = $request->status == true ? '1':'0';

        $editCategory->update();
        return redirect()->to('category')->with('message-update','Category Updated Successfully!!!');
    }

    /* Delete Category */

    public function categoryDelete($id){
        $deleteCategory=Category::find($id);
        $deleteCategory->delete();
        return redirect()->to('category')->with('message-delete', 'Category has been deleted successly!!');
    }
}
