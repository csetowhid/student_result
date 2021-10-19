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
        $data = [];
        $obj = new Mark();
        foreach($row as $k => $r){
            if ($k != 'student_id'){
                $sub = Subject::select('id')->where('subject_name', ucfirst($k))->first();
                $data['marks'] = $r;
                $data['subject_id'] = $sub->id;
                $data['student_id'] = $row['student_id'];
                $obj = new Mark($data);
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
