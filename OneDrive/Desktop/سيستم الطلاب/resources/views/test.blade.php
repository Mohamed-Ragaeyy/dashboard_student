$request = Orders::create([

'employee_id' => $request->employee_id,
'services_id' => $request->services_id,
'comments' => $request->comments,
'price' => $request->price,
'clients_id' => $request->clients_id,
'finishied' => $request->finishied,
'paid' => $request->paid,
'invoice_id' => $request->invoice_id,
'paid_amount' => $request->paid_amount,
'requirements_pass' => $request->requirements_pass,
'sample_date' => $request->sample_date,
'reciveing_date' => $request->reciveing_date,
'expiredate' => $request->expiredate,
]);

// $ImgName1 = time() . $request->requirements_pass->getClientOriginalName();
// $profilePath = 'images';
// $request->requirements_pass->move($profilePath, $ImgName1);
// $Request =  Orders::query()->update(["requirements_pass" => $ImgName1]);

// $requirements_pass = [];
// if ($request->file('requirements_pass')){
//     foreach($request->file('requirements_pass') as $key => $requirements_pass)
//     {
//         $fileName = time().rand(1,99).'.'.$requirements_pass->extension();
//         $requirements_pass->move(public_path('images'), $fileName);
//         $requirements_pass[]['name'] = $fileName;
//     }
// }

// foreach ($requirements_pass as $key => $file) {
//     Orders::create($file);
// }

// if($request->requirements_pass != null || !empty($request->requirements_pass)){
//     foreach($request->requirements_pass as $file)
//     {
//         foreach($file as $carFile){
//             $name = date('Y-m-d-H-i-s',time()).'-'.rand(1,100).'.'.$carFile->getClientOriginalExtension();
//             $carFile->move(public_path('images'), $name);
//             $files =  $file .','.$name;
//         }
//         $request = Orders::create([]
//     }
// }

$files="";
if($request->files != null || !empty($request->files)){
foreach($request->files as $file)
    {
        foreach($file as $carFile){
            $name = date('Y-m-d-H-i-s',time()).'-'.rand(1,100).'.'.$carFile->getClientOriginalExtension();
            $carFile->move(public_path('images'), $name);
            $files =  $files .','.$name;
        }
    }
}

$request = Orders::create($request->files = $files );
