<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $course = $this->route('course');

        return [
            'title' => 'sometimes|required|string|max:255',
            'code' => [
                'sometimes',
                'required',
                'string',
                'max:50',
                Rule::unique('courses', 'code')->ignore($course?->id),
            ],
            'description' => 'nullable|string|max:1000',
            'credits' => 'nullable|integer|min:1|max:20',
        ];
    }
}