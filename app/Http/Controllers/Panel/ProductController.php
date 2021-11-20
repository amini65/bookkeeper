<?php

namespace App\Http\Controllers\Panel;

use App\Helpers\UploadHandler;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public $listTitle;
    public $createTitle;
    public $editTitle;
    public $uploadPath = "/upload/product/";

    public function __construct()
    {
        $this->listTitle=__('product lists');
        $this->createTitle=__('product create');
        $this->editTitle=__('product edit');

    }

    public function index(ProductRepository $productRepository)
    {
        $lists=$productRepository->getProducts();

        return view('panel.product.list',compact('lists'))->with('title',$this->listTitle);
    }


    public function create()
    {
        return view('panel.product.create')->with('title', $this->createTitle);
    }


    public function store(Request $request,ProductRepository $productRepository)
    {

        $image='';
        if ($request->file('image')) {
            $image = UploadHandler::uploadDocumentHandler($request->file('image'), $this->uploadPath, false);
        }
        $productRepository->store($request,$image);
        return redirect()->route("products.index")->with("flash_message", __('flash message create success'));

    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        return view('panel.product.edit',compact('product'))->with('title', $this->editTitle);
    }


    public function update(Request $request, Product $product,ProductRepository $productRepository)
    {

        $image='';
        if ($request->file('image')) {
            $image = UploadHandler::uploadDocumentHandler($request->file('image'), $this->uploadPath, false);
        }
        $productRepository->update($request,$product,$image);
        return redirect()->route("products.index")->with("flash_message", __('flash message edit success'));
    }


    public function destroy(Product  $product)
    {
        try {
            $product->delete();
            return redirect()->route('products.index')->with("flash_message", __('flash message delete success'));

        } catch (\Exception $e) {
            return redirect()->route('products.index')->with("flash_message", __('flash message error'));
        }

    }

}
