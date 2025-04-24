<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks', TaskController::class);
Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');

Route::get('/string-tools', function () {
    return view('string-tools');
});

Route::post('/string-tools', function (Request $request) {
    $original = $request->input('text_input');

    $chars = mb_str_split($original);
    
    // Optional example check: paranthesis
    $stack = [];
    $parenthesis = ['(', '{', '[',')', '}', ']'];
    $isValid = false;
    
    foreach ($chars as $char) {
        if (in_array($char, $parenthesis)) {
            if (count($stack) > 0 &&
                ($stack[count($stack)-1] == '(' && $char == ')'
                || $stack[count($stack)-1] == '{' && $char== '}'
                || $stack[count($stack)-1] == '[' && $char == ']')) {
                    array_pop($stack);
            } else
            array_push($stack, $char);
        }
    }

    $isValid = count($stack) == 0;

    return view('string-tools', [
        'original' => $original,
        'chars' => $chars,
        'isValid' => $isValid,
        'stack' => count($stack),
    ]);
});