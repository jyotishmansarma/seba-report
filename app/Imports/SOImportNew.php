<?php

namespace App\Imports;

use App\Models\Centerlist;
use App\Models\So;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SOImportNew implements ToCollection
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {


            $center = trim($row[0]);
            $name = $row[1];
            $mobile = trim($row[2]);
            $add1 = $row[3];
            if ($add1 == null) {
                $add1 = "NA";
            }
            $add2 = trim($row[4]);


            if ($mobile == "" || $mobile == null) {
                continue;
            }
            //check if already assigned wd center

            $centerInDB = Centerlist::where("center_code", $center)->first();

            if ($centerInDB) {


                $so = So::where(['phone_no' => $mobile])->first();
                if ($so) {

                    $so->update(['centre_id' => $centerInDB->id,'name' => $name, 'hm' => 4]);

                } else {

                    $so = So::where(['centre_id' => $centerInDB->id, 'phone_no' => $mobile])->first();
                    if ($so) {

                        $so->update(['name' => $name, 'workplace_address' => $add1, 'workplace_address1' => $add2, 'hm' => 1]);

                    } else {

                        $so = So::where(['centre_id' => $centerInDB->id, 'name' => $name])->first();
                        if ($so) {

                            if (So::where(['phone_no' => $mobile])->count() == 0) {
                                $so->update(['phone_no' => $mobile, 'workplace_address' => $add1, 'workplace_address1' => $add2, 'hm' => 2]);
                            }
                        } else {
                            if (So::where(['phone_no' => $mobile])->count() == 0) {

                                So::create(['centre_id' => $centerInDB->id, 'home_address' => 'N/A', 'dist_id' => $centerInDB->district_id, 'designation' => 'SO', 'name' => $name, 'phone_no' => $mobile, 'workplace_address' => $add1, 'workplace_address1' => $add2, 'password' => bcrypt("final2022"), 'hm' => 3]);

                            }
                        }
                    }


                }


            }
        }

    }
}
