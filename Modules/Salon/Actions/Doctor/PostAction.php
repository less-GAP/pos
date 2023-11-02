<?php


namespace Modules\Salon\Actions\Doctor;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Modules\Salon\Middleware\AdminIsAuthenticated;

class PostAction
{
    public function handle(Request $request)
    {
        $data = $request->all();

        try {
            $doctor = new Doctor();
            if (isset($data['id']) && $data['id'] > 0) {
                $doctor = Doctor::find($data['id']);
            }

            $doctor->fill($data);
            $doctor->save();

            $output = [
                'code' => 1,
                'message' => 'Success!',
                'data' => $doctor
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
