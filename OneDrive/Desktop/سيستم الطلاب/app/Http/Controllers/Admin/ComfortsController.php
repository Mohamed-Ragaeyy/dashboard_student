<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comforts;
use App\Models\Students;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;




class ComfortsController extends Controller
{
    public function index($id)
    {
        $id = $id;
        $comforts = Comforts::where('id_student', $id)->get();
        return view('admin.comforts.index', compact('comforts' , 'id'));
    }

    public function all()
    {
        $comforts = Comforts::get();
        return view('admin.comforts.index2', compact('comforts'));
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

        return view('admin.comforts.create' , compact('students' , 'dd'));
    }

    public function save(Request $request)
    {

    $validator = Validator::make($request->all(),[
        'id_student' => 'required',
        'reason' => 'required',
        'days' => 'required',
        'class_discount' => 'required',
    ]);

    if($validator->fails()){
        return Redirect::back()->withErrors($validator)->withInput();
     }else{

        $data = $request->all();
        $user =   Comforts::create($data);
        return redirect()->route('admin.comfort.index' ,$request->id_student);
     }

    }

    public function edit($id)
    {
       $students =  Students::all();
       $comfort = Comforts::find($id);
        return view('admin.comforts.edit', compact('comfort' , 'students'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'id_student' => 'required',
            'reason' => 'required',
            'days' => 'required|numeric',
            'class_discount' => 'required',
        ]);


        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
         }else{

              $user = Comforts::find($id);
              Comforts::where("id" , $id)->update(["id_student" => $request->id_student , "reason" => $request->reason , "days" => $request->days, "class_discount" => $request->class_discount ]);
              return redirect()->route('admin.comfort.index' ,$user->id);
            }
    }
    public function destroy($id)
    {

       $comfort = Comforts::find($id);
       $comfort->delete();

        return back();
    }

}
