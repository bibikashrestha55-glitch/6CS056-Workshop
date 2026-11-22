<?php

use App\Http\Controllers\StudentController;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Student Routes (Step 7)
Route::get('/students', [StudentController::class, 'index'])
    ->name('students.index');

Route::get('/students/create', [StudentController::class, 'create'])
    ->name('students.create');

Route::post('/students', [StudentController::class, 'store'])
    ->name('students.store');

Route::get('/students/{id}', [StudentController::class, 'show'])
    ->name('students.show');

Route::get('/students/{id}/edit', [StudentController::class, 'edit'])
    ->name('students.edit');

Route::put('/students/{id}', [StudentController::class, 'update'])
    ->name('students.update');

Route::delete('/students/{id}', [StudentController::class, 'destroy'])
    ->name('students.destroy');


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