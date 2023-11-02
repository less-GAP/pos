<?php


namespace Modules\Salon\Actions\Wards;

use App\Models\Wards;
use Illuminate\Http\Request;
use Modules\Salon\Middleware\AdminIsAuthenticated;

class PostAction
{
    public function handle(Request $request)
    {
        $data = $request->all();

        try {
            $ward = new Wards();
            if (isset($data['id']) && $data['id'] > 0) {
                $ward = Wards::find($data['id']);
            }

            $ward->fill($data);
            $ward->save();

            $output = [
                'code' => 1,
                'message' => 'Success!',
                'data' => $ward
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
