<?php

namespace App\Http\Controllers;

use App\Models\Succsess_Ratings;
use App\Http\Requests\StoreSuccsess_RatingsRequest;
use App\Http\Requests\UpdateSuccsess_RatingsRequest;
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
    public function show(Succsess_Ratings $id)
    {
        $rating=Succsess_Ratings::with(['school'])->load($id);
        return Succsess_RatingResource::collection($rating);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSuccsess_RatingsRequest $request, Succsess_Ratings $succsess_Ratings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Succsess_Ratings $succsess_Ratings)
    {
        //
    }
}
