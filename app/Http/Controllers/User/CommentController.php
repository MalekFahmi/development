<?php

namespace App\Http\Controllers\User;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Client\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usercomments=Comment::where('userId',auth('user'))->get();
        return CommentResource::collection($usercomments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->validate(
            [
                'schoolId'=>['required'],
                'description'=>['required']
            ]
        );
        $input['userId']=auth('user')->id();
        Comment::create($input);
        return response()->json([
            'message' => 'Comment added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usercomment=Comment::where('id',$id)->where('userId',auth('user')->id())->firstorfail();
        return CommentResource::collection($usercomment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id,Request $request)
    {
        $update= $request->validate(
            [
                'schoolId'=>['required'],
                'description'=>['required']
            ]
        );
        $usercomment=Comment::where('id',$id)->where('userId',auth('user')->id())->firstorfail();
        $usercomment->update($update);
        return response()->json([
            'message' => 'comment is updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usercomment=Comment::where('id',$id)->where('userId',auth('user')->id())->firstorfail();
        $usercomment->delete();
        return response()->json(data: ['message'=>'comment is deleted successfully']);
    }
}
