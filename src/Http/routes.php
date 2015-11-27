<?php

Route::resource('todo', 'Freengersdev\firstmodule\Http\ExampleController');

Route::get('todo/{todo}/delete/', 'Freengersdev\firstmodule\Http\ExampleController@delete');
