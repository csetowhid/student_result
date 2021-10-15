<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Studentclass;
use Illuminate\Http\Request;

class ClassstudentController extends Controller
{
    public function classstudent()
    {
        $data['student_class'] = Student::groupBy('class_id')
            ->selectRaw('count(id) as total_student, class_id')
            ->get();

        // $data['student_class'] = Student::
        // join('studentclasses','students.class_id','studentclasses.id')
        // ->select('studentclasses.class_name as clas_name')
        // ->groupBy('class_id')
        //     ->selectRaw('count(id) as total_student, class_id')
        //     ->get();
        // dd($data);
        return view('class.index',$data);
    }

    public function class_all_student($id)
    {
        $data['students'] = Student::where('class_id',$id)->get();
        $data['clas_name'] = Studentclass::where('id',$id)->first()->class_name;
        return view('class.allstudents',$data);
    }
}
