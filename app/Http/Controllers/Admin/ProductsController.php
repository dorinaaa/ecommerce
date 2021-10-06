<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreProductFormRequest;

class ProductsController extends BaseController
{

    protected $categoryRepository;

    protected $productRepository;

    public function __construct(
        CategoryContract $categoryRepository,
        ProductContract $productRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->listProducts();

        $this->setPageTitle('Products', 'Products List');
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {

        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageTitle('Products', 'Create Product');
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->createProduct($params);

        if($request->image_path) {
            $imgName = $request->image_path->getClientOriginalName().'.'.$request->image_path->extension();
            $request->image_path->move(public_path('images'), $imgName);
            $coverPath = '/images/'.$imgName ;
        }

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product added successfully', 'success', false, false);
    }

    public function edit($id)
    {
        $product = $this->productRepository->findProductById($id);

        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageTitle('Products', 'Edit Product');
        return view('admin.products.edit', compact('categories', 'product'));
    }

    public function update(Request $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->updateProduct($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product updated successfully', 'success', false, false);
    }

    public function delete($id) {
        $this->productRepository->deleteProduct($id);
        return $this->responseRedirect('admin.products.index', 'Product deleted successfully', 'success', false, false);
    }

}