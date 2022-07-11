<?php

use App\Models\Admin\So;
use App\Models\Centerlist;
use App\Models\ExamRoutine;
use App\Models\SoPhotoUpload;
use App\Models\SoReport;
use Illuminate\Support\Carbon;

function get_shift_name($shift)
{
    if ($shift == 1) {
        return "Opening question paper (Morning)";
    }
    if ($shift == 2) {
        return "Closing question paper (Morning)";
    }
    if ($shift == 3) {
        return "Opening question paper (Evening)";
    }
    if ($shift == 4) {
        return "Closing question paper (Evening)";
    }
}
function count_center()
{
    $total_centres = Centerlist::count();
    return  $total_centres;
}
function count_so()
{
    $so = So::count();
    return $so;
}
function count_so_report()
{
    $time_table = ExamRoutine::get();
    $total_so_report = [];
    foreach ($time_table->unique('date') as $time_tables) {
        //   $total_so_report[] = SoReport::where('time_table_id', $time_tables->id)->count();
        $total_reports = SoReport::select(\DB::raw('count(DISTINCT so_id) as total_report'))->where('time_table_id', $time_tables->tt_id)->first();
        //$total_so_report = SoReport::count();
        $total_so_report[] = $total_reports->total_report;
    }
    return array_sum($total_so_report);
}

function graph_recod()
{
    $time_table = ExamRoutine::get();

    foreach ($time_table->unique('date') as $time_tables) {
        $date[] = $time_tables->date;

        $user[] = SoReport::where('time_table_id', $time_tables->id)->count();
        $total_student[] = SoReport::where('time_table_id', $time_tables->id)->sum(\DB::raw('total_male_morning + total_female_morning'));
    }
    return response()->json($date, $user, $total_student);
}


function getCenterId($model, $id)
{
    $data = $model::where('center_code', $id)->first();
    $data = $model::where('phone_no', $id)->first();
    return $data;
}
function soDetailsCheck($model, $mobile_number)
{
    $phone_number = $model::where('phone_no', $mobile_number)->first();

    return $phone_number;
}


function getCenterDetails($model, $id, $name)
{

    $data = $model::where('center_code', $id)->where('school_name', $name)->first();

    return $data;
}
function ActiveUploadButton($id)
{
    $exam_time=ExamRoutine::where('id',$id)->first();
    date_default_timezone_set('Asia/Kolkata');
    $time= date('H:i');
    $start_time=substr($exam_time->start_time, 0, 5);
    $start_time=date('H:i',strtotime($exam_time->start_time));
    $hours = (strtotime( $start_time) - strtotime($time)) / 3600;

    if ($exam_time->date == date('Y-m-d')) {
        if( strtotime($time)<= strtotime($start_time)){

             if( $hours==1){
                 return true;
             }
             if( $hours<=1){
                return true;
            }
        }else{
            return true;
        }

    }elseif($exam_time->date < date('Y-m-d')){
       return true;
    }
}
function ActiveSubmitButton($id)
{
    $exam_time=ExamRoutine::where('id',$id)->first();
    date_default_timezone_set('Asia/Kolkata');
    $time= date('H:i');
    $end_time=date('H:i',strtotime($exam_time->end_time));
    $hours = (strtotime( $end_time) - strtotime($time)) / 3600;

    if ($exam_time->date == date('Y-m-d')) {

        if( strtotime($time)<= strtotime($end_time)){

             if( $hours==1){

                 return true;

             }
             if( $hours<=1){

                return true;
            }
        }else{

            return true;
        }

    }elseif($exam_time->date < date('Y-m-d')){
       return true;
    }

}
function uploadPhotoStatus($routine_id,$user_id,$shift){
if($shift=='MORNING'){
    $so_opening_paper_morning=SoPhotoUpload::where([['so_id',$user_id],['time_table_id',$routine_id],['photo_type','OQPM']])->first();
    $so_closeing_paper_morning=SoPhotoUpload::where([['so_id',$user_id],['time_table_id',$routine_id],['photo_type','CQPM']])->first();

    if( $so_opening_paper_morning && $so_closeing_paper_morning){
        return true;
    } else{
        return false;
    }
}else{

    $so_opening_paper_afternoon=SoPhotoUpload::where([['so_id',$user_id],['time_table_id',$routine_id],['photo_type','OQPE']])->first();
    $so_closeing_paper_afternoon=SoPhotoUpload::where([['so_id',$user_id],['time_table_id',$routine_id],['photo_type','CQPE']])->first();

    if( $so_opening_paper_afternoon && $so_closeing_paper_afternoon){
        return true;
    } else{
        return false;
    }

}

}
