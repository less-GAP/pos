<?php


namespace Modules\Salon\Actions\PaymentMethod;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Modules\Salon\Middleware\AdminIsAuthenticated;

class PostAction
{
    public function handle(Request $request)
    {
        $data = $request->all();

        try {
            $payment_method = new PaymentMethod();
            if (isset($data['id']) && $data['id'] > 0) {
                $payment_method = PaymentMethod::find($data['id']);
            }

            $payment_method->fill($data);
            $payment_method->save();

            $output = [
                'code' => 1,
                'message' => 'Success!',
                'data' => $payment_method
            ];
        } catch (\Throwable $e) {
            $output = [
                'code' => 0,
                'message' => $e->getMessage(),
                'data' => []
            ];
        }
        return $output;
    }
}
