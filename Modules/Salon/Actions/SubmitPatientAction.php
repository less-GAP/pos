<?php


namespace Modules\Salon\Actions;


use App\Models\Patient;
use Illuminate\Http\Request;

class SubmitPatientAction
{
    public function handle(Request $request){
        $data=$request->all();
        return [
            'result'=>Patient::create($data),
            'message'=>'Submit Patient Successfully!'
        ];
    }
}
