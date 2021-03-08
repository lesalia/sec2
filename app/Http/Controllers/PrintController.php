<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function index()
    {
        $doc = Doc::all();
        return view('printstudents')->with('docs', $doc);
    }
    public function prnpriview()
    {
        $doc = Doc::all();
        return view('students')->with('docs', $doc);
    }
}
