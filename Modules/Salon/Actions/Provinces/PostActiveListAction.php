<?php


namespace Modules\Salon\Actions\Provinces;

use App\Models\Provinces;
use Illuminate\Http\Request;

class PostActiveListAction
{
    public function handle(Request $request)
    {
        $data = $request->all();
        try {
            $res = Provinces::whereIn('id', $data['items'])->update([
                'status' => $data['status']
            ]);

            $output = [
                'code' => 1,
                'message' => 'Success!',
                'data' => []
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
