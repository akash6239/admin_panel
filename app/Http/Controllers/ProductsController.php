<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function product(Request $request)
    {
        if ($request->isMethod('post')) {
            // Validate input
            $validator = Validator::make($request->all(), [
                'product_name' => 'required',
                'product_slug' => 'required|max:255|unique:products',
                'sku' => 'required',
                'sale_price' => 'required',
                'regular_price' => 'required',
                'product_packaging' => 'required',
                'product_composition' => 'required',
                'meta_title' => 'required',
                'meta_keywords' => 'required',
                'meta_description' => 'required',
                'product_image' => 'required|image|max:1024',
                'meta_image' => 'required|image|max:1024',
                'description' => 'required',
                'product_categories' => 'required'
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            // Handle product image
            $productImage = null;
            if ($request->hasFile('product_image')) {
                $productImageFile = $request->file('product_image');
                $productImage = time() . '_product.' . $productImageFile->getClientOriginalExtension();
                $productImageFile->move(public_path('photos/image'), $productImage);
            }
    
            // Handle meta image
            $metaImage = null;
            if ($request->hasFile('meta_image')) {
                $metaImageFile = $request->file('meta_image');
                $metaImage = time() . '_meta.' . $metaImageFile->getClientOriginalExtension();
                $metaImageFile->move(public_path('photos/image'), $metaImage);
            }
    
            // Create product
            $product = Product::create([
                'product_name' => $request->input('product_name'),
                'product_slug' => $request->input('product_slug'),
                'description' => $request->input('description'),
                'sku' => $request->input('sku'),
                'sale_price' => $request->input('sale_price'),
                'regular_price' => $request->input('regular_price'),
                'product_packaging' => $request->input('product_packaging'),
                'product_composition' => $request->input('product_composition'),
                'meta_title' => $request->input('meta_title'),
                'meta_keywords' => $request->input('meta_keywords'),
                'meta_description' => $request->input('meta_description'),
                'meta_image' => $metaImage,
                'product_image' => $productImage,
            ]);
            foreach($request->product_categories as $item){
                ProductCategory::create([
                    'product_id' => $product->id,
                    'category_id' => $item
                ]);
            }
    
           
            // Redirect back with success message
            return redirect()->route('productview')->with('status', 'Successfully Added New Product!');
        }
    
        // Handle GET request to display the form
        $product_category = Category::where('category_type', "products")->orderBy('id', 'desc')->get();
        return view("admin.pages.products.new", [
            'product_category' => $product_category,
        ]);
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,xlsx,xls',
        ]);

        Excel::import(new ProductImport, $request->file('file'));

        return redirect()->back()->with('success', 'Users imported successfully!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function productview(Request $request)
    {
        $products = Product::with('categories')->orderBy('created_at', 'desc')->get();
        $categories = Category::where('status', 1)->get();
        return view('admin.pages.products.view', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $product = Product::with('categories')->findOrFail($id);
        $product_category = Category:: where('category_type', "products")->orderBy('id', 'desc')->get();
        return view("admin.pages.products.edit",[
            'product_category' => $product_category,
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function productUpdate(Request $request , $id)
{
    // return $request->all();

    // Define the validation rules
    $validator = Validator::make($request->all(), [
        'product_name' => 'required',
        'product_slug' => [
            'required',
            'max:255',
            Rule::unique('products', 'product_slug')->ignore($id),
        ],
        'sku' => 'required',
        'sale_price' => 'required|numeric',
        'regular_price' => 'required|numeric',
        'product_packaging' => 'required',
        'product_composition' => 'required',
        'meta_title' => 'required',
        'meta_keywords' => 'required',
        'meta_description' => 'required',
        'product_image' => 'nullable|image|max:1024',
        'meta_image' => 'nullable|image|max:1024',
        'description' => 'nullable',
        'product_categories' => 'required|array'
    ]);

    // If validation fails, redirect back with errors
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
        $product = Product::findOrFail($id);

    $updateData = [
        'product_name' => $request->input('product_name'),
        'product_slug' => $request->input('product_slug'),
        'sku' => $request->input('sku'),
        'sale_price' => $request->input('sale_price'),
        'regular_price' => $request->input('regular_price'),
        'product_packaging' => $request->input('product_packaging'),
        'product_composition' => $request->input('product_composition'),
        'meta_title' => $request->input('meta_title'),
        'meta_keywords' => $request->input('meta_keywords'),
        'meta_description' => $request->input('meta_description'),
        'description' => $request->input('description'),
    ];

    // Handle file uploads if files are provided
    if ($request->hasFile('product_image')) {
        // Delete the old image if it exists
        if ($product->product_image && file_exists(public_path('photos/image/' . $product->product_image))) {
            unlink(public_path('photos/image/' . $product->product_image));
        }

        // Store the new product image
        $file = $request->file('product_image');
        $filename = 'product_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('photos/image'), $filename);

        // Add the new image path to update data
        $updateData['product_image'] = $filename;
    }

    if ($request->hasFile('meta_image')) {
        // Delete the old meta image if it exists
        if ($product->meta_image && file_exists(public_path('photos/image/' . $product->meta_image))) {
            unlink(public_path('photos/image/' . $product->meta_image));
        }

        // Store the new meta image
        $file = $request->file('meta_image');
        $filename = 'meta_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('photos/image'), $filename);

        // Add the new image path to update data
        $updateData['meta_image'] = $filename;
    }

    // Update the product with the new data
    $product->update($updateData);

    // Update product categories
    // Remove existing categories
    ProductCategory::where('product_id', $product->id)->delete();

    // Add new categories
    foreach ($request->product_categories as $categoryId) {
        ProductCategory::create([
            'product_id' => $product->id,
            'category_id' => $categoryId
        ]);
    }

    // Redirect with a success message
    return redirect()->route('productview')->with('status', 'Product Updated Successfully!');
}
        

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request, $id)
    {

        // delete product
        try {

            $product = Product::findOrFail($id);
            $product->categories()->detach();
            $product->delete();
            return redirect()->back()->with('status', 'Product deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to delete the product.']);
        }
    }

    // product change status
    public function changestatus($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
        $product->status = $product->status ? 0 : 1;
        $product->save();
        return redirect()->back()->with('status', 'Product status changed successfully');

    }
}
