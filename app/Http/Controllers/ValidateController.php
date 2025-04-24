<?php

namespace App\Http\Controllers;

use App\Models\Validate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Validate $validate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Validate $validate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Validate $validate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Validate $validate)
    {
        //
    }

    public function validateParanthesis(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        return response()->json(['message' => 'Validation passed!']);
    }
}
