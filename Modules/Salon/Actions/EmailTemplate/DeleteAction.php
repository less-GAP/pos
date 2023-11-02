<?php


namespace Modules\Salon\Actions\EmailTemplate;


use App\Models\EmailTemplate;
use Illuminate\Http\Request;

class DeleteAction
{
    public function handle(Request $request)
    {

        $query = EmailTemplate::query();
        return [
            'result' =>$query->find($request->route('id'))->delete(),
            'message' => 'Delete Successfully!'
        ];
    }
}
