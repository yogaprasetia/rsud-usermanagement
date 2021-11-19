<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Product;
use App\Http\Resources\Product as ProductResource;
   
class ProductController extends BaseController
{

    public function index()
    {
        $Products = Product::all();
        return $this->sendResponse(ProductResource::collection($Products), 'Posts fetched.');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $Product = Product::create($input);
        return $this->sendResponse(new ProductResource($Product), 'Post created.');
    }

   
    public function show($id)
    {
        $Product = Product::find($id);
        if (is_null($Product)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new ProductResource($Product), 'Post fetched.');
    }
    

    public function update(Request $request, Product $Product)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $Product->title = $input['name'];
        $Product->description = $input['detail'];
        $Product->save();
        
        return $this->sendResponse(new ProductResource($Product), 'Post updated.');
    }
   
    public function destroy(Product $Product)
    {
        $Product->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}