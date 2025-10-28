<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolTeacherRequest;
use App\Http\Resources\SchoolTeacherResource;
use App\Models\SchoolTeacher;
use Illuminate\Http\Request;

class schoolteachercontroller extends Controller
{
    public function index()
    {
        $schoolteacher=SchoolTeacher::with(['school', 'teacher', 'grade'])->get();
        return SchoolTeacherResource::collection($schoolteacher);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolTeacherRequest $request)
    {
        $input = $request->validated();
        SchoolTeacher::create($input);
        return response()->json([
            'message' => 'Teacher created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
