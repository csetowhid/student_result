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
        $subject = Mark::where('student_id', $request->student_id)
        ->where('subject_id', $request->subject_id)
        ->first();

        if($subject) {
            return redirect()->back()->withInput()->with("ERROR", __("Marks already exist"));
        }

        /* --------Method -1 ------------
        $subject = $request->subject_id;
        $mark = $request->marks;
        for($i=0; $i<count($subject);$i++){
            $datasave = [
                'subject_id' => $subject[$i],
                'marks' => $mark[$i],
                'student_id' => $request->student_id,
            ];
            Mark::insert($datasave);
        }

        ------------------------------------*/

        /* --------Method -2 ------------
        // for($i=0; $i<count($subject);$i++){
        //     $data = Mark::create ([
        //         'subject_id' => $subject[$i],
        //         'marks' => $mark[$i],
        //         'student_id' => $request->student_id,
        //     ]);
        // }
        ---------------------------------*/

        for($i=0; $i < count($request->except('_token'));$i++){
            $data = Mark::create ([
                'subject_id' => $request->subject_id[$i],
                'marks' => $request->marks[$i],
                'student_id' => $request->student_id,
            ]);
        }

        if(empty($data)) {
            return redirect()->back()->withInput()->with("ERROR", __("Failed to Input"));
        }
        return redirect()->route('home')->with("SUCCESS", __("Marks Added successfully"));
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
