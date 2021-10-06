<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UploadAble;
use App\Models\Photos;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;

class ProductPhotoController extends Controller
{
    use UploadAble;

    protected $productRepository;

    public function __construct(ProductContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }



    public function upload(Request $request)
    {
        $product = $this->productRepository->findProductById($request->product_id);
    
        if ($request->has('photo')) {
    
            $photo = $this->uploadOne($request->photo, 'products');
    
            $productImage = new Photos([
                'full'      =>  $photo,
            ]);
    
            $product->photo()->save($productImage);
        }
    
        return response()->json(['status' => 'Success']);
    }


    public function delete($id)
    {
        $photo= Photos::findOrFail($id);
    
        if ($photo->full != '') {
            $this->deleteOne($photo->full);
        }
        $photo->delete();
    
        return redirect()->back();
    }

}
