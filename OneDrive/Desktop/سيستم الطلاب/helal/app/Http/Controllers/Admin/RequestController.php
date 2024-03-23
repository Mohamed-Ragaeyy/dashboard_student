<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Orders;
// use App\Models\Request;
use App\Models\Clients;
use App\Models\Services;
use App\Models\Employees;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Request;

class RequestController extends Controller
{
    public function index()
    {
        $role =  auth()->user()->role;
        $iduser =  auth()->user()->id;
        if ($role == 'admin'){
            $requests = Orders::get();
        }else{
            $requests = Orders::where("employee_id" , $iduser)->get();
        }

        return view('admin.requests.index', compact('requests'));
    }

    public function finances()
    {
        $requests = Orders::all();
        return view('admin.finances.index', compact('requests'));
    }

    public function newfinances()
    {
        $requests = Orders::where('status', '=', 0)->get();
        return view('admin.finances.index', compact('requests'));
    }

    public function create()
    {
        $clients = Clients::all();
        $employees = User::all();
        $services = Services::all();
        return view('admin.requests.create', compact('clients','employees' ,'services'));
    }

    public function save(Request $request)
    {

        $dd = explode(',',$request->services_id);
        $services_id = $dd[0];
        $services_id=str_replace('"','',$services_id);
        Orders::create([

            'employee_id' => $request->employee_id,
            'services_id' =>  $services_id,
            'comments' => $request->comments,
            'price' => $request->price,
            'clients_id' => $request->clients_id,
            // 'finishied' => $request->finishied,
            // 'paid' => $request->paid,
            // 'invoice_id' => $request->invoice_id,
            'paid_amount' => $request->paid_amount,
            'requirements_pass' => $request->requirements_pass,
            // 'files' => $request->files,
            'sample_date' => $request->sample_date,
            'reciveing_date' => $request->reciveing_date,
            'expiredate' => $request->expiredate,
            ]);

     if($request->requirements_pass != null){
        $ImgName1 = time() . $request->requirements_pass->getClientOriginalName();
        $profilePath = 'images';
        $request->requirements_pass->move($profilePath, $ImgName1);
        $Request =  Orders::query()->update(["requirements_pass" => $ImgName1]);

       }


       $files = "";
       if ($request->filess){
           foreach($request->filess as $key => $file)
           {
               $fileName = time().rand(1,99).'.'.$file->extension();
               $file->move(public_path('images'), $fileName);
               if($key == 0){
                $files =  $fileName;
               }else{
                $files =  $files .','.$fileName;
               }

           }
             Orders::query()->update(["filess" => $files]);
       }

        return redirect()->route('admin.request.index');
    }



    public function edit($id)
    {
        $request = Orders::find($id);
        $clients = Clients::get();
        // dd($client);die;
        // $service = Services::where('id', $request->services_id)->first();
        $services = Services::get();
        // $employee = Employees::where('id', $request->employee_id)->first();
        $employees = User::get();

        // dd($service);die;

        return view('admin.requests.edit', compact('request','clients','employees','services'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->requirements_pass);die;
        // $request = Orders::find($id);
        // $request->update($request->all());
        $dd = explode(',',$request->services_id);
        $services_id = $dd[0];
        $services_id=str_replace('"','',$services_id);
        Orders::query()->where('id', '=', $id)->update([

            'employee_id' => $request->employee_id,
            'services_id' =>  $services_id,
            'comments' => $request->comments,
            'price' => $request->price,
            'clients_id' => $request->clients_id,
            // 'finishied' => $request->finishied,
            // 'paid' => $request->paid,
            // 'invoice_id' => $request->invoice_id,
            'paid_amount' => $request->paid_amount,
            // 'requirements_pass' => $request->requirements_pass,
            // 'files' => $request->files,
            'sample_date' => $request->sample_date,
            'reciveing_date' => $request->reciveing_date,
            'expiredate' => $request->expiredate,

            ]);

            if(isset($request->requirements_pass) &&  $request->requirements_pass != null){
                $ImgName1 = time() . $request->requirements_pass->getClientOriginalName();
                // $ImgName1 = time().rand(1,99).'.'.$request->requirements_pass->extension();
                $profilePath = 'images';
                $request->requirements_pass->move($profilePath, $ImgName1);
                Orders::query()->where('id', '=', $id)->update(["requirements_pass" => $ImgName1]);
               }

               $files = "";
               if ($request->filess){
                   foreach($request->filess as $key => $file)
                   {
                       $fileName = time().rand(1,99).'.'.$file->extension();
                       $file->move(public_path('images'), $fileName);
                       if($key == 0){
                        $files =  $fileName;
                       }else{
                        $files =  $files .','.$fileName;
                       }

                   }
                     Orders::query()->where('id', '=', $id)->update(["filess" => $files]);
               }

        return redirect()->route('admin.request.index');
    }



    public function updateStatus(Request $request, $id)
    {
        Orders::query()->where('id', '=', $id)->update([
            'status' => 1
            ]);
        return redirect()->route('admin.finances.index');
    }

    public function updateStatus2(Request $request, $id)
    {
        Orders::query()->where('id', '=', $id)->update([
            'status' => 2
            ]);
        return redirect()->route('admin.finances.index');
    }


    public function search(Request $request)
    {

        $requests =  Orders::where('employee_id', '=', $request->search)->get();
        return view('admin.finances.index', compact('requests'));
    }




    public function destroy($id)
    {

       $request = Orders::find($id);
       $request->delete();

        return back();
    }
}
