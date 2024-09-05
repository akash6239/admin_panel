<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\categoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function blogs(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'blog_name' =>'required',
                'slug' =>'required',
                'description' =>'required',
                'meta_title' =>'required',
                'meta_keywords' =>'required',
                'meta_description' =>'required',
                'meta_image' => 'nullable|image|max:1024',
                'image' =>'nullable|image|max:1024',
                'blog_alt' =>'required',
                'blog_categories.*' => 'exists:categories,id',
            ]);
            
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // Handle meta image
            $metaImage = null;
            if ($request->hasFile('meta_image')) {
                $metaImageFile = $request->file('meta_image');
                $metaImage = time() . '_metablogimg.' . $metaImageFile->getClientOriginalExtension();
                $metaImageFile->move(public_path('photos/image'), $metaImage);
            }
            // Handle meta image
            $blogImage = null;
            if ($request->hasFile('image')) {
                $blogImageFile = $request->file('image');
                $blogImage = time() . '_blogimg.' . $blogImageFile->getClientOriginalExtension();
                $blogImageFile->move(public_path('photos/image'), $blogImage);
            }

            $blog = Blog::create([
                'blog_name' => $request->input('blog_name'),
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
                'meta_title' => $request->input('meta_title'),
                'meta_keywords' => $request->input('meta_keywords'),
                'meta_description' => $request->input('meta_description'),
                'blog_alt' => $request->input('blog_alt'),
                'meta_image' => $metaImage,
                'image' => $blogImage,
            ]);

            // Attach product categories
            if ($request->has('blog_categories')) {
                foreach ($request->input('blog_categories') as $categoryId) {
                    categoryBlog::create([
                        'blog_id' => $blog->id,
                        'category_id' => $categoryId
                    ]);
                }
            }

            return redirect()->route('blogview')->with('status', 'Blog Added Successfully!');
        }else{
            $product_category = Category::where('category_type', "products")->orderBy('id', 'desc')->get();
            $blogs = Blog::all();
            return view("admin.pages.blogs.add",compact(['product_category','blogs']));
        }
    }

    public function blogview()
    {
        $blogs = Blog::with('categories')->orderBy('id', 'desc')->get();
        return view('admin.pages.blogs.view',compact('blogs'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $blogcategory = Category:: where('category_type', "products")->orderBy('id', 'desc')->get();
        return view('admin.pages.blogs.edit',compact(['blog','blogcategory']));
    }

    public function blogupdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'blog_name'=> 'required',
            'slug' => [
                 'required',
                 'max:255',
                 Rule::unique('blogs', 'slug')->ignore($id),
             ],
            'description'=> 'required',
            'meta_title'=> 'required',
            'meta_keywords'=> 'required',
            'meta_description'=> 'required',
            'blog_categories.*'=> 'required',
            'blog_alt'=> 'required',
            'meta_image'=>'nullable|image|max:1024',
            'image'=> 'nullable|image|max:1024',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $blog = Blog::findOrFail($id);
        $updateData = [
            'blog_name' => $request->input('blog_name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'meta_title' => $request->input('meta_title'),
            'meta_keywords' => $request->input('meta_keywords'),
            'blog_alt' => $request->input('blog_alt'),
            'meta_description' => $request->input('meta_description'),
        ];

        // Handle blog image
        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path('photos/image/' . $blog->image))) {
                unlink(public_path('photos/image/' . $blog->image));
            }
            $file = $request->file('image');
            $filename = 'blog_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('photos/image'), $filename);
            $updateData['image'] = $filename;
        }
        // Handle meta image
        if ($request->hasFile('meta_image')) {
            if ($blog->meta_image && file_exists(public_path('photos/image/' . $blog->meta_image))) {
                unlink(public_path('photos/image/' . $blog->meta_image));
            }
            $file = $request->file('meta_image');
            $filename = 'blogmetaimg' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('photos/image'), $filename);
            $updateData['meta_image'] = $filename;
        }

        $blog->update($updateData);

          // Update product categories
          categoryBlog::where('blog_id', $blog->id)->delete();
          foreach ($request->input('blog_categories') as $categoryId) {
            categoryBlog::create([
                  'blog_id' => $blog->id,
                  'category_id' => $categoryId
              ]);
          }
      
          // Redirect with a success message
          return redirect()->route('blogview')->with('status', 'Blog Updated Successfully!');
    }
    public function delete(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        if($blog){
            $metaImagePath = 'photos/image/' . $blog->meta_image;
            $blogImagePath = 'photos/image/' . $blog->image;

            // Delete product image if it exists
        if ($blog->image && file_exists(public_path($blogImagePath))) {
            unlink(public_path($blogImagePath));
        }

        // Delete meta image if it exists
        if ($blog->meta_image && file_exists(public_path($metaImagePath))) {
            unlink(public_path($metaImagePath));
        }
        // Detach all related categories
        $blog->categories()->detach();

        // Delete the product record
        $blog->delete();

        // Redirect with success message
        return redirect()->back()->with(['status' => 'Blog Deleted Successfully!']);
        }
    }

    public function changestatus($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->back()->with('error', 'Blog not found');
        }
        $blog->status = $blog->status ? 0 : 1;
        $blog->save();
        return redirect()->back()->with('status', 'Blog status changed successfully');

    }
}
