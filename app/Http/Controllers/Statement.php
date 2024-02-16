<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class Statement extends Controller
{
    //
    public function index()
    {
        return view('statement', ['expenses' => Expense::where('user_id', auth()->user()->id)->get()]);
    }
}
