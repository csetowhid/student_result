<?php

namespace App\Imports;

use App\Models\Mark;
use App\Models\Subject;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MarksImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{
     use Importable, SkipsErrors, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $data = [];
        // $obj = new Mark();
        // foreach($row as $k => $r){
        //     if ($k != 'student_id'){
        //         $sub = Subject::select('id')->where('subject_name', ucfirst($k))->first();
        //         $data['marks'] = $r;
        //         $data['subject_id'] = $sub->id;
        //         $data['student_id'] = $row['student_id'];
        //         $obj = new Mark($data);
        //         $obj->save();
        //     }
        // }
        // return $obj;



//         $data = [];
//         $obj = new Mark();
//         $subjects = Subject::pluck("id", "name")->toArray();
//         foreach($row as $key => $rows){
//             if ($key != 'student_id' && $key != 'group_id' ){
//                 $data['subject_id'] = $subjects[ucfirst($key)];
//                 $data['student_id'] = $row['student_id'];
//                 $data['group_id'] = $row['group_id'];
//                 $data['marks'] = $rows;
//                 $obj = new Mark($data);
// //                print "<pre>";
// //                print_r($obj);
// //                print "</pre>";
//                 $obj->save();
//             }
//         }
//         return $obj;



        $data = [];
        $obj = new Mark();
        $sub = Subject::pluck('id','subject_name')->toArray();
        foreach($row as $k => $r){
            if ($k != 'student_id' && $k != 'class_id'){
                $data['marks'] = $r;
                $data['subject_id'] = $sub[ucfirst($k)];
                $data['student_id'] = $row['student_id'];
                $data['class_id'] = $row['class_id'];
                $obj = new Mark($data);
                // $obj->save();

                // $validate = Mark::where('student_id',$data['student_id'])
                //         ->where('subject_id',$data['subject_id'])->first();
                        // dd($validate);
                //         if($validate){
    
                //         }

                $obj->save();
                    
            }
        }
        return $obj;

    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
