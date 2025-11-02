<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Http\Resources\EvaluationResource;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Client\Request;


class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userevaluations=Evaluation::where('userId',auth('user'))->get();
        return EvaluationResource::collection($userevaluations);
    }

    public function store(StoreEvaluationRequest $request)
    {
        $input=$request->validate(
            [
                'schoolId'=>['required'],
                'rating'=>['required']
            ]
        );
        $input['userId']=auth('user')->id();
        Evaluation::create($input);
        return response()->json([
            'message' => 'rating added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userevaluation=Evaluation::where('id',$id)->where('userId',auth('user')->id())->firstorfail();
        return EvaluationResource::collection($userevaluation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id,Request $request)
    {
        $update= $request->validate(
            [
                'schoolId'=>['required'],
                'rating'=>['required']
            ]
            );
        $userevaluation=Evaluation::where('id',$id)->where('userId',auth('user')->id())->firstorfail();
        $userevaluation->update($update);
        return response()->json([
            'message' => 'rating is updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userevaluation=Evaluation::where('id',$id)->where('userId',auth('user')->id())->firstorfail();
        $userevaluation->delete();
        return response()->json(data: ['message'=>'rating is deleted successfully']);
    }
}
