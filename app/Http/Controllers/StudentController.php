<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Grade_student;
use App\Models\Departmen;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
{
    if(request()->is('admin/*')) {
        return view('admin.student_admin', [
            'title' => 'Student Management',
            'students' => Student::with(['grade_student', 'departmen'])->get()
        ]);
    }

    return view('student', [
        'title' => 'Student',
        'students' => Student::with(['grade_student', 'departmen'])->get()
    ]);
}

    public function addData(){
        return view('add_data', [
            'title' => 'Add New Data Student',
            'grade_students' => Grade_student::all(),
            'departmens' => Departmen::all()
        ]);
    }
}
