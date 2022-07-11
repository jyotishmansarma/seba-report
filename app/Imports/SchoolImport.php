<?php

namespace App\Imports;



use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SchoolImport implements ToCollection, WithStartRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //

        $data_for_insert = $collection->map(function ($row, $key) {


            return [
                'code'     => trim($row[1]),
                'school_name'    => $row[2],
                'medium' => $row[3],
                'head_master' =>  $row[4],
                'contact_person' => $row[5],
                'phone' => trim($row[6]),
                'email' => $row[7],
                'login_pin' => rand(1111, 9999),
                'address1' => $row[8],
                'address2' => $row[9],
                'city' => $row[10],
                'district' => $row[11],
                'state' => $row[12],
                'pincode' => trim($row[13]),
            ];
        });
        $chunks = $data_for_insert->chunk(100);
        foreach ($chunks as $chunk) {
            DB::table('schools')->insert($chunk->toArray());
        }
    }

    public function headingRow(): int
    {
        return 2;
    }
    public function startRow(): int
    {
        return 2;
    }
}
