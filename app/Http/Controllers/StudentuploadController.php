<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentImportRequest;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentuploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studentupload.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentImportRequest $request)
    {
        /* --------------------
        $file = $request->file('file');
        // $file = $request->file('file')->store('import');  //Local Server Import
        // Excel::import(new StudentsImport, $file);

        $import = new StudentsImport;
        $import->import($file);

        if($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }
        // dd($import->failures());
        // (new StudentsImport)->import($file); //Importable use 

        return back()->with('SUCCESS',__("Students Imported Successfully"));
        -----------------------------*/


     if($request->file('file')){
        $file = $request->file('file');
        $import = new StudentsImport;
        $import->import($file);

        if($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        return back()->with('SUCCESS',__("Students Imported Successfully"));
     }
     else{
        return back()->with('SUCCESS',__("wrong"));
     }
        
        // $file = $request->file('file')->store('import');  //Local Server Import
        // Excel::import(new StudentsImport, $file);

        // $import = new StudentsImport;
        // $import->import($file);

        // if($import->failures()->isNotEmpty()) {
        //     return back()->withFailures($import->failures());
        // }
        // // dd($import->failures());
        // // (new StudentsImport)->import($file); //Importable use 

        // return back()->with('SUCCESS',__("Students Imported Successfully"));
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
