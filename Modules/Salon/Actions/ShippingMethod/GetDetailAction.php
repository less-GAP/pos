<?php


namespace Modules\Salon\Actions\ShippingMethod;


use App\Models\ShippingMethod;
use App\Providers\AbstractModuleProvider;
use Illuminate\Http\Request;

class GetDetailAction
{
    public function handle(Request $request)
    {
        $shipping_method = [];
        $id = $request->route('id');
        if ($id > 0) {
            $shipping_method = ShippingMethod::where('id', $id)->first();
        }
        return [
            'code' => 1,
            'message' => 'Success!',
            'data' => $shipping_method
        ];
    }
}
