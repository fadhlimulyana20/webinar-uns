<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebinarJadwal as Webinar;

class PagesController extends Controller
{
    public function index(){
        $webinars = Webinar::all()->take(4);
        return view('pages.index')->with('webinars', $webinars);
    }

    public function about(){
        return view('pages.about');
    }
}
