<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class StudentsImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation,SkipsOnFailure
        
{
    use Importable, SkipsErrors,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return new Student([
        //     'class_id' => $row[0],
        //     'first_name' => $row[1],
        //     'last_name' => $row[2],
        //     'email' => $row[3],
        // ]);

        return new Student([
            'class_id' => $row['class_id'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
        ]);

    }


    public function rules(): array
    {
        return [
            '*.email' => [
                'email',
                'unique:students'
            ],
            // 'file' => [
            //     'required',
            //     'mimes:xlsx'
            // ],
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'file.mimes' => 'Wrong File Upload',
    //     ];
    // }


    // public function onFailure(Failure ...$failure)
    // {
        
    // }

    // public function onError(Throwable $e)
    // {
        
    // }
}
