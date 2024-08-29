<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function category(Request $request)
    {
        if ($request->isMethod('post')){
            $input = $request->all();
            $validator = Validator::make($request->all(),[
                'category_name'  => 'required',
                'slug' => 'required|max:255|unique:categories',
                'category_type' => 'required',
                'meta_title' => 'required',
                'meta_keyword' => 'required',
                'meta_description' => 'required',
                'category_image' => 'required|image|max:1024',
            ]);
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if($request->hasFile('category_image')){

                $files = $request->file('category_image');
                $filename = 'category'.time().'.'.$files->getClientOriginalName();
                $files->move('photos/image',$filename);

                // $path = $request->file->store('photos', 'public');

                $pcat = Category::create([
                    'category_name' => $input['category_name'],
                    'slug' => $input['slug'],
                    'category_type' => $input['category_type'],
                    'meta_title' => $input['meta_title'],
                    'meta_keyword' =>$input['meta_keyword'],
                    'meta_description' => $input['meta_description'],
                    'category_image' => $filename,
                ]);

                return redirect()->back()->with(['status' => 'Successfully Added New Category !']);
            }
        }
        else{
            $categories = Category::orderBy('created_at', 'desc')->get();
            return view("admin.pages.category.view",[
                'categories' => $categories,
            ]);
            // return $product_category;
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function categoriesupdate(Request $request)
    {
        // Validate incoming data
        $validator = Validator::make($request->all(), [
            'category_name'  => 'required',
            'slug' => 'required|max:255|unique:categories,slug,' . $request->input('id'),
            'category_type' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'category_image' => 'nullable|image|max:1024', // Optional image field
        ]);
    
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Retrieve the category to be updated
        $category = Category::findOrFail($request->input('id'));
    
        // Prepare update data
        $updateData = [
            'category_name' => $request->input('category_name'),
            'slug' => $request->input('slug'),
            'category_type' => $request->input('category_type'),
            'meta_title' => $request->input('meta_title'),
            'meta_keyword' => $request->input('meta_keyword'),
            'meta_description' => $request->input('meta_description'),
        ];
    
        // Handle file upload if a new image is provided
        if ($request->hasFile('category_image')) {
            // Delete the old image if it exists
            if ($category->category_image && file_exists(public_path('photos/image/' . $category->category_image))) {
                unlink(public_path('photos/image/' . $category->category_image));
            }
    
            // Store the new image
            $file = $request->file('category_image');
            $filename = 'category_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('photos/image'), $filename);
    
            // Add the new image path to update data
            $updateData['category_image'] = $filename;
        }
    
        // Update category with new data
        $category->update($updateData);
    
        // Redirect back with a success message
        return redirect()->route('category')->with('status', 'Category Updated Successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function editcategory(Request $request, $id)
    {
            $category = Category::find($id);
            return view("admin.pages.category.edit",[
                 'category' => $category,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletecategory(Request $request, $id)
{
   
    $category = Category::find($id);

    if ($category) {
        $imagePath = 'photos/image/' . $category->category_image;
        
        if (file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath));
        }

        $category->delete();

        return redirect()->back()->with(['status' => 'Category Deleted Successfully!']);
    }

    return redirect()->back()->withErrors('Category not found');
}
}
