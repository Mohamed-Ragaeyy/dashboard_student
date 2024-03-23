<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sections;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $sections = Sections::all();
        return view('admin.services.create' , compact('sections'));
    }

    public function save(Request $request)
    {
       $service = Services::create($request->all());
        return redirect()->route('admin.service.index');
    }

    public function edit($id)
    {
       $service = Services::find($id);
       $sections = Sections::all();
        return view('admin.services.edit', compact('service' ,'sections'));
    }

    public function update(Request $request, $id)
    {
        $service = Services::find($id);
        $service->update($request->all());

        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' =>$service->id]);
        // }
        return redirect()->route('admin.service.index');
    }

    public function destroy($id)
    {

       $service = Services::find($id);
       $service->delete();

        return back();
    }
}
