
<?php

use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

// Create Student Form
Route::get("/students/create", function () {
    return view("student.create");
});

// Display Students
Route::get('/students', function () {
    $students = Student::all();

    return view('student.list', [
        'students' => $students
    ]);
})->name('students.index');

// View Student Details
Route::get('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);

    return view('student.detail', [
        'student' => $student
    ]);
});

// Edit Student Form
Route::get('/students/{id}/edit', function ($id) {
    $student = Student::findOrFail($id);

    return view('student.edit', [
        'student' => $student
    ]);
});

// Update Student
Route::put('/students/{id}', function (Request $request, $id) {
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('students')->ignore($student->id)
        ],
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($validated);

    return redirect('/students/' . $student->id)
        ->with('success', 'Student updated successfully!');
});

// Store Student
Route::post("/students", function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student = Student::create($validated);

    return redirect()->route('students.index')
        ->with('success', "Student {$student->name} created successfully!");
});

// Delete Student
Route::delete('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);

    $student->delete();

    return redirect('/students')
        ->with('success', 'Student deleted successfully!');
});

// Create Course Form
Route::get('/courses/create', function () {
    return view('course.create');
});

// Display Courses
Route::get('/courses', function () {
    $courses = Course::all();

    return view('course.list', [
        'courses' => $courses
    ]);
})->name('courses.index');

// View Course Details
Route::get('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);

    return view('course.detail', [
        'course' => $course
    ]);
});

// Edit Course Form
Route::get('/courses/{id}/edit', function ($id) {
    $course = Course::findOrFail($id);

    return view('course.edit', [
        'course' => $course
    ]);
});

// Store Course
Route::post('/courses', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'duration' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
    ]);

    $validated['is_active'] = $request->boolean('is_active');

    $course = Course::create($validated);

    return redirect()->route('courses.index')
        ->with('success', 'Course created successfully!');
});

// Update Course
Route::put('/courses/{id}', function (Request $request, $id) {
    $course = Course::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'duration' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
    ]);

    $validated['is_active'] = $request->boolean('is_active');

    $course->update($validated);

    return redirect('/courses/' . $course->id)
        ->with('success', 'Course updated successfully!');
});

// Delete Course
Route::delete('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);

    $course->delete();

    return redirect('/courses')
        ->with('success', 'Course deleted successfully!');
});