<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeesRequest;
use App\Models\Fees;
use Illuminate\Http\Request;

class feescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $price=Fees::all();
        return response()->json(['data'=>$price]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeesRequest $request)
    {
        $input = $request->validated();
        Fees::create($input);
        return response()->json([
            'message' => 'price added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $price=Fees::findOrFail($id);
        return response()->json(['data'=>$price]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeesRequest $request, string $id)
    {
        $update = $request->validated();
        $price= Fees::findOrFail($id);
        $price->update($update);
        return response()->json([
            'message' => 'Price is updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $price=Fees::findorFail(id: $id); 
        $price->delete();
        return response()->json(data: ['message'=>'price is deleted successfully']);
    }
}
