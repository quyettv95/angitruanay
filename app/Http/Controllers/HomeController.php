<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\Meal;
use Setting;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $meal = Meal::instance();
        $todayMeal = $meal->getTodayMeal();
        $yesterdayMeal = $meal->getYesterdayMeal();
        return view('home.index', compact('todayMeal', 'yesterdayMeal'));
    }
}
