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
                
                if(isset($row[0]) &&  isset($row[1]) && isset($row[2]) && isset($row[3]) && isset($row[4])) { 
                    $id = StudentId::firstOrCreate([
                        'student_number' => $row[5]
                    ]);

                    if(isset($id)) { 
                        Student::create([
                            'name' => $row[1],
                            'course' => $row[2],
                            'yearLevel' => $row[3],
                            'status' => $row[4],
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
