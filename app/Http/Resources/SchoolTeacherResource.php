<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SchoolTeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'school name'=> $this->school->name,
            'teacher name'=> $this->teacher->name,
            'teacher subject'=> $this->teacher->subject,
            'grade' => $this->grade->level
        ];
    }
}
