<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Disciplinary;
use App\Models\Students;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class DisciplinaryController extends Controller
{
    public function index($id)
    {
        $id = $id;
        $disciplinarys = Disciplinary::where('id_student', $id)->get();
        return view('admin.disciplinarys.index', compact('disciplinarys' , 'id'));
    }

    public function all()
    {
        $disciplinarys = Disciplinary::get();
        return view('admin.disciplinarys.index2', compact('disciplinarys'));
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
        return view('admin.disciplinarys.create' , compact('students' , 'dd'));
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
        $user =   Disciplinary::create($data);
        return redirect()->route('admin.disciplinary.index' ,$request->id_student);
     }

    }

    public function edit($id)
    {
       $students =  Students::all();
       $disciplinary = Disciplinary::find($id);
        return view('admin.disciplinarys.edit', compact('disciplinary' , 'students'));
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

              $user = Disciplinary::find($id);
              Disciplinary::where("id" , $id)->update(["id_student" => $request->id_student , "reason" => $request->reason , "type" => $request->type, "class_discount" => $request->class_discount ]);
              return redirect()->route('admin.disciplinary.index' ,$user->id);
            }
    }
    public function destroy($id)
    {

       $disciplinary = Disciplinary::find($id);
       $disciplinary->delete();

        return back();
    }

}
