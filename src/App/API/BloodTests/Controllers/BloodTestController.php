<?php

namespace App\API\BloodTests\Controllers;

use App\API\Controller;
use Illuminate\Http\Request;
use Domain\BloodTests\Models\BloodTest;
use App\API\BloodTests\Requests\BloodTestStoreRequest;

class BloodTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BloodTestStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BloodTestStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  BloodTest  $test
     * @return \Illuminate\Http\Response
     */
    public function show(BloodTest $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  BloodTest  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BloodTest $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  BloodTest  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodTest $test)
    {
        //
    }
}
