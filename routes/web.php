<?php

// Usuarios sin autenticacion
Auth::routes();
Route::get('/', function() {
    return redirect()->route('login');
});

// Usuarios autenticados
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');

    // Cotizacion
    Route::resource('budget', 'User\BudgetController');
    Route::get('budget/{budget}/generatePdf', 'User\BudgetController@generatePdf')->name('budget.pdf.generate');
    Route::get('budget/{budget}/downloadPdf', 'User\BudgetController@downloadPdf')->name('budget.pdf.download');

    // Configuracion
    Route::get('config', 'User\ConfigController@config')->name('config');
    Route::put('config/changePassword', 'User\ConfigController@changePassword')->name('config.changePassword');
    Route::post('config/uploadLogo', 'User\ConfigController@uploadLogo')->name('config.logo');
    Route::put('config/business', 'User\ConfigController@updateBusiness')->name('config.business');
});
