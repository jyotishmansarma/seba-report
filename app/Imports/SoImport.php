<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SoImport implements ToCollection, WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //

        $data_for_insert = $collection->map(function($row, $key){

            $center_code = getCenterId("App\Models\Centerlist",intval($row[8]));
            $phone_number = soDetailsCheck("App\Models\So",intval($row[4]));


            $center_code = getCenterId("App\Models\Centerlist",trim($row[8]));
            $phone_number = soDetailsCheck("App\Models\So",intval($row[4]));
            $row_number = $key + 2;

            if($phone_number){
                throw new \App\Exceptions\DataNotFoundException("Phone number already exsist on Row {$row_number}");
            }
            if(!$center_code){
                throw new \App\Exceptions\DataNotFoundException("Center code Not Found On Row {$row_number}");
            }
            return [
                'name' => $row[0],
                'centre_id' =>$center_code->id,
                'dist_id'=>$center_code->district_id,
                'designation'=>$row[2],
                'email' => $row[3],
                //'password' => Hash::make('123456'),
                'email'=>$row[3],
                'phone_no'=>$row[4],
                'workplace_address'=>$row[5],
                'home_address'=>$row[6],
                'password' => Hash::make('final2022'),
                'email'=>$row[3],
                'phone_no'=>intval($row[4]),
                'workplace_address'=>$row[5],
                'workplace_address1'=>$row[6],
                'home_address'=>'N/A',

                'distance_to_centre'=>0,
            ];
        });
        DB::table('sos')->insert($data_for_insert->toArray());
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
