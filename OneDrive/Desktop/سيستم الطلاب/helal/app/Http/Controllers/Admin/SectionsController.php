<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sections;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionsController extends Controller
{
    public function index()
    {
        $sections = Sections::all();
        return view('admin.sections.index', compact('sections'));
    }

    public function create()
    {
        $sections = Sections::all();
        return view('admin.sections.create');
    }

    public function save(Request $request)
    {
       $section = Sections::create($request->all());
        return redirect()->route('admin.section.index');
    }

    public function edit($id)
    {
       $section = Sections::find($id);
        return view('admin.sections.edit', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $section = Sections::find($id);
        $section->update($request->all());

        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' =>$section->id]);
        // }
        return redirect()->route('admin.section.index');
    }

    public function destroy($id)
    {

       $section = Sections::find($id);
       $section->delete();

        return back();
    }
}
