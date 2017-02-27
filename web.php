<?php

Route::get('/', function () {
    return redirect()->to('/crud');
});
Route::resource('crud','crudcontroller');
