<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarkRequest;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $marks = Mark::groupBy('student_id')
        //     ->selectRaw('sum(marks) as sum, student_id')
        //     ->get();
            // $marks = Mark::groupBy('student_id')->sum('marks')->get();
            // $marks = Mark::select('student_id','sum(marks)')->groupBy('student_id');
            // $marks = Mark::groupBy('student_id')->sum('marks');

            $marks = Mark::selectRaw('sum(marks) as sum')
            ->groupBy('student_id')->get();

            dd($marks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['students'] = Student::all();
        $data['subjects'] = Subject::all();
        return view('marks.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarkRequest $request)
    {
        $marks = Mark::create([
            'marks' => $request->get('marks'),
            'student_id' => $request->get('student_id'),
            'subject_id' => $request->get('subject_id'),
        ]);

        if(empty($marks)){
            return redirect()->back()->withInput();
        }
        return redirect()->route('home')->with('SUCCESS',__("Marks Has Been Added Successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function show(Mark $mark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function edit(Mark $mark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mark $mark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $mark)
    {
        //
    }
}
