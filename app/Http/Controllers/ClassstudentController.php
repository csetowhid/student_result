<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ClassstudentController extends Controller
{
    public function classstudent()
    {
        $data['student_class'] = Student::groupBy('class_id')
            ->selectRaw('count(id) as total_student, class_id')
            ->get();
        return view('class.index',$data);
    }
}
