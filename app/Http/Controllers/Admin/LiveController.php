<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Live;

class LiveController extends Controller
{
    public function index() {
        $data = Live::orderBy('sort','desc') -> get();
        return view('admin.live.index',compact('data'));
    }
}
