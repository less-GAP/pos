<?php


namespace Modules\Salon\Actions\Product;

use App\Models\Product;
use App\Models\ProductPackage;
use Illuminate\Http\Request;
use Modules\Salon\Middleware\AdminIsAuthenticated;

class PostAction
{
    public function handle(Request $request)
    {
        $data = $request->all();

        try {
            $product = new Product();
            if (isset($data['id']) && $data['id'] > 0) {
                $product = Product::find($data['id']);
            }

            if (!isset($data['slug']) || $data['slug'] == '') {
                $data['slug'] = \Str::slug($data['name']);
            }

            $product->fill($data);
            $product->save();
            if($request->input('images')){
                $syncImages = [];
                foreach($request->input('images') as $imageData){
                    $syncImages[$imageData['id']]=['type'=>$imageData['type']??'image'];
                }
                $product->images()->sync($syncImages);
            }
            if($data['type'] == 'package'){
                if(isset($data['id']) && $data['id'] > 0){
                    ProductPackage::where('package_id',$data['id'])->delete();
                }
                if(!empty($data['packages'])){
                    foreach($data['packages'] as $v){
                        $pa = [
                            'package_id' => $product->id,
                            'product_id' => $v['id'],
                            'product_descr' => $v
                        ];
                        ProductPackage::create($pa);
                    }
                }
            }

            $output = [
                'code' => 1,
                'message' => 'Success!',
                'data' => $product
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