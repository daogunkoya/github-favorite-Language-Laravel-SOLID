<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $git_branch = 'Unknown';
    $last_modified_date = 'Unknown';
    $last_modified_time = 'Unknown';
    $head_file = '/GIT_BRANCH_INFO';

    if (file_exists($head_file)) {
        $git_branch = file_get_contents($head_file);
        $git_branch = explode('/', $git_branch);
        $git_branch = end($git_branch);
        $created_at_timestamp = filectime($head_file);
        $last_modified_date = date('d/m/Y', $created_at_timestamp);
        $last_modified_time = date('H:i:s A', $created_at_timestamp);
    }

    return view('welcome', [
        'git_branch_name' => $git_branch,
        'last_modified_date' => $last_modified_date,
        'last_modified_time' => $last_modified_time,
    ]);

});


Route::resource('resource','ResourcesController');
Route::post('/search', ['as'=>'resource.search', 'uses'=>'ResourcesController@search']);
