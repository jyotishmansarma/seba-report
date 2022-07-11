<?php

namespace App\Imports;

use App\Models\Centerlist;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CenterListImport implements ToCollection,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {


        foreach ($rows as $row)
        {
            $center=Centerlist::where('center_code',$row[4])
                ->where('school_name', $row['3'])
                ->first();
            if( !$center){
                $data= [
                        'district_name' => trim($row[0]),
                                'district_id' =>trim($row[1]),
                                'school_code'=>trim($row[2]),
                                'school_name'=>trim($row[3]),
                                'center_code' => trim($row[4]),
                                'flag' =>trim($row[5]),
                                'address'=>trim($row[6]),
                                'phone_no'=>trim($row[7]),
                                'stream'=>trim($row[8]),
                                'permited'=>trim($row[9]),
                                'tag_code'=>trim($row[10]),
                            ];
                            Centerlist::create($data);
            }

        }
        //
    }


    //     $data_for_insert = $collection->map(function($row, $key){
    //         $center_details = getCenterDetails("App\Models\Centerlist",trim($row[4]),trim($row[3]));
    //         $row_number = $key + 2;

    //         // if($phone_number){
    //         //     throw new \App\Exceptions\DataNotFoundException("Phone number already exsist on Row {$row_number}");
    //         // }
    //         // if(!$center_code){
    //         //     throw new \App\Exceptions\DataNotFoundException("Center code Not Found On Row {$row_number}");
    //         // }

    //     if(!$center_details){
    //         return [
    //             'district_name' => trim($row[0]),
    //             'district_id' =>trim($row[1]),
    //             'school_code'=>trim($row[2]),
    //             'school_name'=>trim($row[3]),
    //             'center_code' => trim($row[4]),
    //             'flag' =>trim($row[5]),
    //             'address'=>trim($row[6]),
    //             'phone_no'=>trim($row[7]),
    //             'stream'=>trim($row[8]),
    //             'permited'=>trim($row[9]),
    //             'tag_code'=>trim($row[10]),
    //         ];
    //     }
    //     });
    //     $data=$data_for_insert->unique('center_code','school_name');
    //     dd( $data);

    //     DB::table('centerlists')->insert($data->toArray());
    // }

    // public function headingRow(): int
    // {
    //     return 2;
    // }
    public function startRow(): int
    {
        return 2;
    }
}
