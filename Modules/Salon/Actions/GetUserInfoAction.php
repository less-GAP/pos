<?php


namespace Modules\Salon\Actions;


class GetUserInfoAction
{
    public function handle(){
        return \Auth::guard('admin')->user();
    }
}
