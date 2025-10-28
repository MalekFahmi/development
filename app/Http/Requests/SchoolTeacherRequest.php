<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolTeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'schoolId'=>['required','unique:school_teachers,schoolId'],
        'teacherId'=>['required','unique:school_teachers,teacherId'],
        'gradeId'=>['required','unique:school_teachers,gradeId'],
        'year'=>['required'],
        ];
    }
}
