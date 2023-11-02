<?php


namespace Modules\Salon\Actions\Staff;


use App\Models\PermissionGroup;
use Illuminate\Http\Request;

class GetGroupPermission
{
    public function handle(Request $request)
    {
        $query = PermissionGroup::with('items');
        return $query->get();
    }
}
