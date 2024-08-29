<?php

namespace App\Http\Controllers;

use App\Models\Proceed;
use Illuminate\Http\Request;

class ProceedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('frontend.proceed.index');
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
    public function show(Proceed $proceed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proceed $proceed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proceed $proceed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proceed $proceed)
    {
        //
    }
}
