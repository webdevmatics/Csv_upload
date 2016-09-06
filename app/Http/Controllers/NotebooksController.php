<?php

namespace App\Http\Controllers;

use App\Notebook;

class NotebooksController extends Controller
{
    public function index()
    {
    	$notebooks= Notebook::all();

    	return view('notebooks.index',compact('notebooks'));
    }
}
