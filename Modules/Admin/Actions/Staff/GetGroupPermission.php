<?php


namespace Modules\Admin\Actions\Staff;


use App\Models\Permission;
use Illuminate\Http\Request;

class GetGroupPermission
{
    public function handle(Request $request)
    {
        $query = Permission::with('items')
            ->where('status', 'active')
            ->where('is_group', 1);
        return $query->get();
    }
}
