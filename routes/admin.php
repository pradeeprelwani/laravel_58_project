<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

Route::group(['namespace'=> 'AdminAuth'], function () {
    Route::get('/employees', 'EmployeeController@index')->name('employees.index');
    Route::get('/employees/change-status/{emp_id}/{status}', 'EmployeeController@changeStatus')->name('employees.change_status');
});