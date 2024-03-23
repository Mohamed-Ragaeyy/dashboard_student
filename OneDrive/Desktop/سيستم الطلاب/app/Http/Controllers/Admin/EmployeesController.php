<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Error;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Students::all();
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {

        return view('admin.employees.create');
    }

    public function save(Request $request)
    {

    $validator = Validator::make($request->all(),[
        'name' => 'required',
        'national_number' => 'required|max:14|min:14|unique:students,national_number',
        'college' => 'required',
        'section' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'total' => 'required',
        'number' => 'required|integer',
    ]);

    if($validator->fails()){
        return Redirect::back()->withErrors($validator)->withInput();
     }else{

        $data = $request->all();
        Students::create($data);
        return redirect()->route('admin.employee.index');
     }

    }

    public function edit($id)
    {
       $employee = Students::find($id);
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'national_number' => 'required|max:14|min:14',
            'college' => 'required',
            'section' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'total' => 'required',
            'number' => 'required|integer',

        ]);


        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
         }else{

              $user = Students::find($id);
              Students::where("id" , $id)->update(["name" => $request->name , "national_number" => $request->national_number , "college" => $request->college, "section" => $request->section , "total" => $request->total , "phone" => $request->phone , "address" => $request->address , "number" => $request->number]);
              return redirect()->route('admin.employee.index');
            }
    }
    public function destroy($id)
    {

       $employee = User::find($id);
       $employee->delete();

        return back();
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');

        $employees = Students::orwhere('name', 'LIKE', '%' . $keyword . '%')->orwhere('phone', 'LIKE', '%' . $keyword . '%')->orwhere('number', 'LIKE', '%' . $keyword . '%')->get();

        return view('admin.employees.index', compact('employees'));
    }
}
