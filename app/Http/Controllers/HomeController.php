<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', ['reviews' => Review::all()]);
    }
}
