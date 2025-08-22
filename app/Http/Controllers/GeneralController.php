<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Portfolio;
use App\Models\Skill;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index () {
        $about = About::with('avatar')->first();
        $skills = Skill::orderBy('id')->get();
        $portfolio = Portfolio::orderBy('id')->get();

        return view('home', compact('about', 'skills', 'portfolio'));
    }
}
