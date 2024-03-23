<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
     public function index()
    {
        $clients = Clients::all();
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        $activities = Activities::get();
        return view('admin.clients.create' , compact('activities'));
    }

    public function save(Request $request)
    {
       $client = Clients::create($request->all());
        return redirect()->route('admin.client.index');
    }

    public function edit($id)
    {
       $client = Clients::find($id);
       $activities = Activities::get();
        return view('admin.clients.edit', compact('client','activities'));
    }

    public function update(Request $request, $id)
    {
        $client = Clients::find($id);
        $client->update($request->all());

        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' =>$client->id]);
        // }
        return redirect()->route('admin.client.index');
    }

    public function destroy($id)
    {

       $client = Clients::find($id);
       $client->delete();

        return back();
    }
}
