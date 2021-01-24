<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    //dd($users);

    return view('employee.home');
})->name('home');

Route::group(['namespace'=> 'EmployeeAuth'], function () {
    Route::get('/profile', 'ProfileController@index')->name('profile.get');
    Route::post('/update/{employee_id}', 'ProfileController@update')->name('profile.update');
    
});

