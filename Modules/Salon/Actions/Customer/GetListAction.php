<?php


namespace Modules\Salon\Actions\Customer;


use App\Models\Customer;
use Illuminate\Http\Request;

class GetListAction
{
    public function handle(Request $request)
    {
        $query = Customer::query();
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%');
        }
        $query->orderBy('id', 'DESC');
        return $query->paginate($request->input('perPage',20));
    }
}
