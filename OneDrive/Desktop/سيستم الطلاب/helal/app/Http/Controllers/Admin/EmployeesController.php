<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Employees;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Error;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = User::all();
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
        'email' => 'required|email|unique:users|string',
        'password' => 'required|min:6',
    ]);

    if($validator->fails()){
        return Redirect::back()->withErrors($validator)->withInput();
     }else{
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->password2 = $request->password;
        $user->save();
        return redirect()->route('admin.employee.index');
     }

    }

    public function edit($id)
    {
       $employee = User::find($id);
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'password' => 'required|min:6',
        ]);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
         }else{

              $user = User::find($id);

              if($user->email != $request-> email){
                    $validator = Validator::make($request->all(),[
                        'email' => 'required|email|unique:users|string',
                ]);
                if($validator->fails()){
                    return Redirect::back()->withErrors($validator)->withInput();
                    }
              }
              User::where("id" , $id)->update(["name" => $request->name , "email" => $request->email , "password" => bcrypt($request->password) , "password2" => $request->password]);
              return redirect()->route('admin.employee.index');
            }
    }
    public function destroy($id)
    {

       $employee = User::find($id);
       $employee->delete();

        return back();
    }
}
