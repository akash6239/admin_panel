<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Validation\ValidationException;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProductCategory extends Component
{
    use WithFileUploads;

    public $category_name;
    public $slug;
    public $category_type;
    public $meta_title;
    public $meta_keyword;
    public $meta_description;
    public $category_image;

    protected $rules = [
        'category_name' => 'required|string|max:255',
        'slug' => 'required|max:255|unique:categories',
        'category_type' => 'required|string|max:255',
        'meta_title' => 'required|string|max:255',
        'meta_keyword' => 'required|string|max:255',
        'meta_description' => 'required|string|max:255',
        'category_image' => 'image|max:1024',
    ];

    public function submit()
    {
        $this->validate();
        $path = $this->category_image->store('photos', 'public');

        $pcat = Category::create([
            'category_name' => $this->category_name,
            'slug' => $this->slug,
            'category_type' => $this->category_type,
            'meta_title' => $this->meta_title,
            'meta_keyword' =>$this->meta_keyword,
            'meta_description' => $this->meta_description,
            'category_image' => $path,
        ]);
        session()->flash('message', 'Category Added successfully.');
    }

    public function render()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('livewire.product-category',[
            "categories" => $categories,
        ]);
    }
}
