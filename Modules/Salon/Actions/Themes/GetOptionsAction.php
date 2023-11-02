<?php


namespace Modules\Salon\Actions\Themes;


use App\Models\Theme;

class GetOptionsAction
{
    public function handle(){
        return Theme::all()->pluck('name');
    }
}
