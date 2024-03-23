<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function index()
    {
        $activities = Activities::all();
        return view('admin.activities.index', compact('activities'));
    }

    public function create()
    {

        return view('admin.activities.create');
    }

    public function save(Request $request)
    {
       $activitie = Activities::create($request->all());
        return redirect()->route('admin.activitie.index');
    }

    public function edit($id)
    {
       $activitie = Activities::find($id);
        return view('admin.activities.edit', compact('activitie'));
    }

    public function update(Request $request, $id)
    {
        $activitie = Activities::find($id);
        $activitie->update($request->all());

        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' =>$activitie->id]);
        // }
        return redirect()->route('admin.activitie.index');
    }

    public function destroy($id)
    {

       $activitie = Activities::find($id);
       $activitie->delete();

        return back();
    }
}
