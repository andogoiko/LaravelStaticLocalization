<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $today = \Carbon\Carbon::now() //cogemos el día de hoy mediante carbon
    ->settings(
        [
            'locale' => app()->getLocale(), //cogemos el idioma que tenemos seleccionado para saber qué formato dar lo hace carbon automáticamente
        ]
    );
    // LL is macro placeholder for MMMM D, YYYY (you could write same as dddd, MMMM D, YYYY)
    $dateMessage = $today->isoFormat('dddd, LL');

    //$num = NumberFormatter::create('en_US', NumberFormatter::DECIMAL);

    //$num2 = NumberFormatter::create('fr', NumberFormatter::DECIMAL);

    //$num3 = NumberFormatter::create('en_US', NumberFormatter::SPELLOUT);

    //$num4 = NumberFormatter::create('fr', NumberFormatter::SPELLOUT);

    return view('welcome', [
        'date_message' => $dateMessage
    ]);
});

Route::get('language/{locale?}', function ($locale) {

    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});