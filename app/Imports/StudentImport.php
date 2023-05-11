<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\StudentId;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;

class StudentImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        try {
            DB::beginTransaction();

            foreach($rows as $row) { 
                
                if(isset($row[0]) &&  isset($row[1]) && isset($row[2]) && isset($row[4]) && isset($row[5]) && isset($row[6]) && isset($row[8])) { 
                    $id = StudentId::firstOrCreate([
                        'student_number' => $row[5]
                    ]);

                    if(isset($id)) { 
                        Student::create([
                            'name' => $row[1],
                            'course' => $row[2],
                            'year' => $row[3],
                            'level' => $row[4],
                            'school_year' => $row[6],
                            'status' => $row[7],
                            'remarks' => $row[8],
                            'student_id' => $id->id
                        ]);
                    }
                }
            }

            DB::commit();
        } catch (Exception $e) { 
            DB::rollback();
        }
    }
}
