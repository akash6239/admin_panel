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
                'product_image' => 'nullable|image|max:1024',
                'meta_image' => 'nullable|image|max:1024',
                'visual_image.*' => 'nullable|image|max:1024',
                'description' => 'required',
                // 'product_categories' => 'required|array',
                'product_categories.*' => 'exists:categories,id', // Validate category IDs
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
    
            // Handle visual images
            $filenames = [];
            if ($request->hasFile('visual_image')) {
                foreach ($request->file('visual_image') as $file) {
                    $filename = time() . '_' . uniqid() . '_visual.' . $file->getClientOriginalExtension();
                    $file->move(public_path('photos/image'), $filename);
                    $filenames[] = $filename;
                }
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
                'visual_image' => json_encode($filenames), // Store as JSON
            ]);
    
            // Attach product categories
            if ($request->has('product_categories')) {
                foreach ($request->input('product_categories') as $categoryId) {
                    ProductCategory::create([
                        'product_id' => $product->id,
                        'category_id' => $categoryId
                    ]);
                }
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
        $products = Product::with('categories')->orderBy('id', 'desc')->get();
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

     public function productUpdate(Request $request, $id)
     {
         // Validate the request
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
             'visual_image.*' => 'nullable|image|max:1024',
             'description' => 'nullable',
             'product_categories.*' => 'required|array'
         ]);
     
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
     
         // Handle product image
         if ($request->hasFile('product_image')) {
             if ($product->product_image && file_exists(public_path('photos/image/' . $product->product_image))) {
                 unlink(public_path('photos/image/' . $product->product_image));
             }
             $file = $request->file('product_image');
             $filename = 'product_' . time() . '.' . $file->getClientOriginalExtension();
             $file->move(public_path('photos/image'), $filename);
             $updateData['product_image'] = $filename;
         }
     
         // Handle meta image
         if ($request->hasFile('meta_image')) {
             if ($product->meta_image && file_exists(public_path('photos/image/' . $product->meta_image))) {
                 unlink(public_path('photos/image/' . $product->meta_image));
             }
             $file = $request->file('meta_image');
             $filename = 'meta_' . time() . '.' . $file->getClientOriginalExtension();
             $file->move(public_path('photos/image'), $filename);
             $updateData['meta_image'] = $filename;
         }
     
         // Handle visual images
         if ($request->hasFile('visual_image')) {
             // Delete existing visual images
             $existingVisualImages = json_decode($product->visual_image, true);
             if (is_array($existingVisualImages)) {
                 foreach ($existingVisualImages as $image) {
                     if (file_exists(public_path('photos/image/' . $image))) {
                         unlink(public_path('photos/image/' . $image));
                     }
                 }
             }
     
             // Store new visual images
             $filenames = [];
             foreach ($request->file('visual_image') as $file) {
                 $filename = 'visual_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                 $file->move(public_path('photos/image'), $filename);
                 $filenames[] = $filename;
             }
             $updateData['visual_image'] = json_encode($filenames);
         }
     
         // Update the product record
         $product->update($updateData);
     
         // Update product categories
         ProductCategory::where('product_id', $product->id)->delete();
         foreach ($request->input('product_categories') as $categoryId) {
             ProductCategory::create([
                 'product_id' => $product->id,
                 'category_id' => $categoryId
             ]);
         }
     
         // Redirect with a success message
         return redirect()->route('productview')->with('status', 'Product Updated Successfully!');
     }
     
        
        
    public function delete(Request $request, $id)
{
    // Find the product or fail
    $product = Product::findOrFail($id);

    if ($product) {
        // Define paths for product image and meta image
        $productImagePath = 'photos/image/' . $product->product_image;
        $metaImagePath = 'photos/image/' . $product->meta_image;
        $visualImagePath = 'photos/image/' . $product->visual_image;

        // Delete product image if it exists
        if ($product->product_image && file_exists(public_path($productImagePath))) {
            unlink(public_path($productImagePath));
        }

        // Delete meta image if it exists
        if ($product->meta_image && file_exists(public_path($metaImagePath))) {
            unlink(public_path($metaImagePath));
        }

        // Handle deletion of multiple visual images
        if ($product->visual_image) {
            $visualImages = json_decode($product->visual_image, true);
            
            if (is_array($visualImages)) {
                foreach ($visualImages as $image) {
                    $visualImagePath = 'photos/image/' . $image;
                    
                    if (file_exists(public_path($visualImagePath))) {
                        unlink(public_path($visualImagePath));
                    }
                }
            }
        }

        // Detach all related categories
        $product->categories()->detach();

        // Delete the product record
        $product->delete();

        // Redirect with success message
        return redirect()->back()->with(['status' => 'Product Deleted Successfully!']);
    }

    // Redirect with error message if product not found
    return redirect()->back()->withErrors('Product not found');
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
