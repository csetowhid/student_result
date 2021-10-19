<?php
    namespace App\Imports;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use App\User;
    use Illuminate\Support\Collection;
    use Maatwebsite\Excel\Concerns\ToCollection;
    
    class MarksImport implements ToCollection
    {
        public function collection(Collection $rows)
        {
            dd($rows);
            
            // $subjectIDs = Subject::whereIn("subject_name", $rows[0])->pluck("id", "subject_name");
            unset($rows[0]);

            foreach ($rows as $row) 
            {
                Mark::create([
                    "student_id" => $row[0]
                ]);
            }
        }
    }