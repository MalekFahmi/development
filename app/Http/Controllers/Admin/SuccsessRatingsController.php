<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Succsess_Ratings;
use App\Http\Requests\StoreSuccsess_RatingsRequest;
use App\Http\Resources\Succsess_RatingResource;

class SuccsessRatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rating=Succsess_Ratings::with(['school'])->get();
        return Succsess_RatingResource::collection($rating);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSuccsess_RatingsRequest $request)
    {
        $input=$request->validated();
        Succsess_Ratings::create($input);
        return response()->json([
            'message' => 'Rating added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rating=Succsess_Ratings::with(['school'])->findOrFail($id);
        return new Succsess_RatingResource($rating);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSuccsess_RatingsRequest $request, string $id)
    {
        $update=$request->validated();
        $rating=Succsess_Ratings::findOrFail($id);
        $rating->update($update);
        return response()->json([
            'message' => 'rating is updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rating=Succsess_Ratings::findorFail(id: $id); 
        $rating->delete();
        return response()->json(data: ['message'=>'rating is deleted successfully']);
    }
}
