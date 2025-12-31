<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FrontendController extends Controller
{
    public function langHome() {
        return view('lang');
    }
    public function change(Request $request){
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }

    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function products()
    {
        return view('frontend.products');
    }

    public function products1()
    {
        return view('frontend.products1');
    }

    public function cooperationCases()
    {
        return view('frontend.cooperation-cases');
    }
    public function winWinCooperation()
    {
        return view('frontend.win-win-cooperation');
    }

    public function contact()
    {
        return view('frontend.contact');
    }


}
