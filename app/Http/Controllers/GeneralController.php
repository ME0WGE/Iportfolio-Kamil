<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index () {
        $about = About::with('avatar')->first();
        $skills = Skill::orderBy('id')->get();
        $portfolios = Portfolio::orderBy('id')->get();
        $testimonials = Testimonial::all();
        $contacts = Contact::all();
        $services = Service::all();
        $messages = Message::all();

        return view('home', compact('about', 'skills', 'portfolios', 'testimonials', 'contacts', 'services', 'messages'));
    }

    public function nav () {
        $about = About::with('avatar')->first();
        $skills = Skill::orderBy('id')->get();
        $portfolios = Portfolio::orderBy('id')->get();
        $testimonials = Testimonial::all();
        $contacts = Contact::all();
        $services = Service::all();
        $messages = Message::all();

        return view('partials.navbar-front', compact('about', 'skills', 'portfolios', 'testimonials', 'services', 'messages'));
    }

    public function nav_back () {
        $about = About::with('avatar')->first();
        $skills = Skill::orderBy('id')->get();
        $portfolios = Portfolio::orderBy('id')->get();
        $testimonials = Testimonial::all();
        $contacts = Contact::all();
        $services = Service::all();
        $messages = Message::all();

        return view('partials.navbar-back', compact('about', 'skills', 'portfolios', 'testimonials', 'services', 'messages'));
    }
}
