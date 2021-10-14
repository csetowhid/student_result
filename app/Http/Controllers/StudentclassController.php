<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentclassRequest;
use App\Models\Student;
use App\Models\Studentclass;
use Illuminate\Http\Request;

class StudentclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['student_class'] = Student::groupBy('class_id')
        //     ->selectRaw('count(id) as total_student')
        //     ->get();
        // return view('class.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentclassRequest $request)
    {
        $class = Studentclass::create([
            'class_name' => $request->get('class_name'),
        ]);

        if(empty($class)){
            return redirect()->back()->withInput();
        }
        return redirect()->route('studentclasses.index')->with('SUCCESS',__("Class Has Been Added Successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function show(Studentclass $studentclass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function edit(Studentclass $studentclass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Studentclass $studentclass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Studentclass $studentclass)
    {
        //
    }
}
