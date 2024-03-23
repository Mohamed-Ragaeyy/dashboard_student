<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\requestprofile;
use Symfony\Component\HttpKernel\Profiler\Profile;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }

}
