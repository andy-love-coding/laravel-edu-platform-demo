<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Paper;

class PaperController extends Controller
{
    public function index() {
        $data = Paper::all();
        return view('admin.paper.index',compact('data'));
    }
}
