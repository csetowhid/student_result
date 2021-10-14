<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // $data['marks'] = Mark::groupBy('student_id')
        //     ->selectRaw('sum(marks) as sum, student_id')
        //     ->get();

           $data['marks']=Student::join('marks', 'students.id','=','marks.student_id')
           ->join('studentclasses','students.class_id','=','studentclasses.id')
           ->select('studentclasses.class_name as clas_name')
           ->selectRaw('students.*, SUM(marks.marks) AS marks')
           ->groupBy('students.id')
           ->orderBy('marks', 'desc')
           ->get();

        //    dd($data);
        

        return view('home.index',$data);
    }
}
