<?php
use App\Controllers\ParamsController;

app()->get('/', function () {
    response()->json(['message' => 'Congrats!! You\'re on Leaf API']);
});

app()->post('/store', 'ParamsController@store');
