<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function setLocale($lang)
    {
        if (in_array($lang,['en','lv']))
        {
            App::setLocale($lang);
            Session::put('locale',$lang);
            return response()->json(['success' => true]);
        }
        return response()->json(['error' => 'Invalid language'], 400);
    }
}
