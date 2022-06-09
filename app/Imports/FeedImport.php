<?php
  
namespace App\Imports;
  
use App\Models\School;
use App\Models\Caterer;
use App\Models\SchFeeding;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Exception;
  
class FeedImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        try{
    
            $list_check = SchFeeding::where('id', '!=', '')->count();
            // $list_check = count($list_check);
    
            $matchThese = ['sch_name' => $row[2],'caterer_name' => $row[6], 'ezwich' => $row[7]];
            $results = SchFeeding::where($matchThese)->orwhere('sch_name', $row[2])->get();
            if (count($results) > 0){
                //return redirect('/uploads')->with('error', 'Oops..! File already added');
            }else{
                
                if ($list_check < 1){
                    $final = date('Y').'1';
                }else{
                    $calc = SchFeeding::latest('id')->first();
                    $calc = $calc->id;
                    $final = date('Y').($calc + 1);
                }
 
                // $caterer = new Caterer;
                // $caterer->name = $row[6];
                // $caterer->ezwich = $row[7];
                // $caterer->save();
                // return new Caterer([
                //     'user_id' => $row[0],
                //     'school_id' => $row[0], 
                //     'name' => $row[6],
                //     'ezwich' => $row[7]
                // ]);
    
                    // 'user_id' => auth()->user()->id,
                return new SchFeeding([
                    'user_id' => $row[0],
                    'caterer_id' => 1,
                    'district' => $row[1],
                    'sch_name' => $row[2],
                    'enrolment' => $row[3],
                    'net_trans_after_ded' => $row[4],
                    'net_trans_less_charge' => $row[5],
                    'caterer_name' => $row[6],
                    'ezwich' => $row[7],
                    'load_no' => $row[9]
                ]);
    
            }
        }catch(Exception $ex){
            return redirect('/uploads')->with('error', 'Oops..! Error with file content');
        }

    }

    public function startRow(): int
    {
        return 3;
    }
    

}