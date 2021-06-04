<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas para Specialty
Route::get('/specialties', 'SpecialtyController@index');
Route::get('/specialties/create', 'SpecialtyController@create');// Vemos el Form de registro
Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit');

Route::post('/specialties', 'SpecialtyController@store');// Envio del form
Route::put('/specialties/{specialty}', 'SpecialtyController@update'); //Gestiona la edicion de una especialidad
Route::delete('/specialties/{speciPalty}', 'SpecialtyController@destroy');

//Doctors
Route::resource('doctors', 'DoctorController');

//Patients