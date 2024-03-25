<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;

class ColorController extends Controller
{
    public function index (){
        $colors = Color::orderBy('id', 'DESC')->paginate(10);
        return view('admin.colors.index', compact('colors'));
    }

    public function create (){
        return view('admin.colors.create');
    }

    public function store (ColorFormRequest $request){
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1' : '0';
        Color::create($validatedData);

        return redirect('/colors')->with('message','Color has been Added successfully!');
    }

    public function edit(Color $color)
    {
        return view('admin.colors.edit', compact('color'));
    }

    public function update(ColorFormRequest $request, $color_id)
    {
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1' : '0';
        Color::find($color_id)->update($validatedData);

        return redirect('/colors')->with('message','Color has been Updated successfully!');
    }

    public function destroy($color_id)
    {
        $color = Color::findOrFail($color_id);
        $color->delete();

        return redirect()->back()->with('message-delete','Color has been Deleted successfully!');
    }
}
