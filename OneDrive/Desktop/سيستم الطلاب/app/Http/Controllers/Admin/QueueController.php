<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Queue;
use App\Models\Students;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class QueueController extends Controller
{
    public function index($id)
    {
        $id = $id;
        $queues = Queue::where('id_student', $id)->get();
        return view('admin.queues.index', compact('queues' , 'id'));
    }

    public function all()
    {
        $queues = Queue::get();
        return view('admin.queues.index2', compact('queues'));
    }
    public function create($id = null)
    {
        if($id){
            $dd = 1;
            $students =  Students::where('id', $id)->get();

        }else{
            $dd = 0;
            $students =  Students::all();
        }
        return view('admin.queues.create' , compact('students' , 'dd'));
    }

    public function save(Request $request)
    {

    $validator = Validator::make($request->all(),[
        'id_student' => 'required',
        'reason' => 'required',
        'type' => 'required',
        'class_discount' => 'required',
    ]);

    if($validator->fails()){
        return Redirect::back()->withErrors($validator)->withInput();
     }else{

        $data = $request->all();
        $user =   Queue::create($data);
        return redirect()->route('admin.queue.index' ,$request->id_student);
     }

    }

    public function edit($id)
    {
       $students =  Students::all();
       $queue = Queue::find($id);
        return view('admin.queues.edit', compact('queue' , 'students'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'id_student' => 'required',
            'reason' => 'required',
            'type' => 'required',
            'class_discount' => 'required',
        ]);


        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
         }else{

              $user = Queue::find($id);
              Queue::where("id" , $id)->update(["id_student" => $request->id_student , "reason" => $request->reason , "type" => $request->type, "class_discount" => $request->class_discount ]);
              return redirect()->route('admin.queue.index' ,$user->id);
            }
    }
    public function destroy($id)
    {

       $queue = Queue::find($id);
       $queue->delete();

        return back();
    }
}
