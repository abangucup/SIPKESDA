<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $operators = Operator::all();
        return view('operator.index', compact('operators'));
    }
}
