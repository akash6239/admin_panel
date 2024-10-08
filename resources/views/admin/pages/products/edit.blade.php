@extends('admin.layout.sidebar')
@section('content')
<div class="container mt-2">
    <div class="row px-2">
        <div class="card px-2 py-2">
            <h5>Dashboard / Edit Product</h5>
        </div>
    </div>

    <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data"> @csrf
        @method('PUT')
    <div class="row">
        <div class="col-lg-9">
            <div class="card px-2 py-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="example-input-normal" class="form-label">Product Name</label>
                            <input type="text" id="product_name" name="product_name" class="form-control" value="{{$product->product_name}}">
                            @error('product_name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="example-input-normal" class="form-label">Product Slug</label>
                            <input type="text" id="product_slug" name="product_slug" class="form-control" value="{{$product->product_slug}}">
                            @error('product_slug')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <!-- ................editor............ -->
            <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Short Description</h4>
                            <div id="snow-editor" style="height: 200px;">
                                
                            </div> <!-- end Snow-editor-->
                            <input type="hidden" id="quill_html" name="description"></input>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div><!-- end col -->
            </div>
            </div>
            <!-- ................editor............ -->
            <!-- ..................basic product details................ -->
             <div class="card">
             <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mb-3"> Product Data</h4>
                                <div id="basicwizard">

                                    <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-4" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a href="#basictab1" data-bs-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active" aria-selected="true" role="tab">
                                                <i class="fe-arrow-right me-1"></i>
                                                <span class="d-none d-sm-inline">Product Data</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a href="#basictab2" data-bs-toggle="tab" class="nav-link rounded-0 pt-2 pb-2" aria-selected="false" role="tab" tabindex="-1">
                                                <i class="fe-info me-1"></i>
                                                <span class="d-none d-sm-inline">SEO</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content b-0 mb-0 pt-0">

                                        <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12">

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="confirm">SKU</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="sku" name="sku" class="form-control" value="{{$product->sku}}">
                                                            @error('sku')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="regular_price">Regular price (₹)</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="regular_price" name="regular_price" value="{{$product->regular_price}}">
                                                            @error('regular_price')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="sale_price"> Sale price (₹)</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="sale_price" name="sale_price" class="form-control" value="{{$product->sale_price}}">
                                                            @error('sale_price')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="product_packaging"> Product Packaging</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="product_packaging" name="product_packaging" class="form-control" value="{{$product->product_packaging }}">
                                                            @error('product_packaging')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="product_composition"> Product Composition</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="product_composition" name="product_composition" class="form-control" value="{{$product->product_composition}}">
                                                            @error('product_composition')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>

                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </div>




                                        <div class="tab-pane" id="basictab2" role="tabpanel">
                                        <div class="row">
                                                <div class="col-12">

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="meta_title">Meta Title</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="meta_title" name="meta_title" class="form-control" value="{{$product->meta_title}}">
                                                            @error('meta_title')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="meta_keywords">Meta Keywords</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{$product->meta_keywords}}">
                                                            @error('meta_keywords')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="meta_description"> Meta Description</label>
                                                        <div class="col-md-9">
                                                           <textarea name="meta_description" id="" class="form-control" value="{{$product->meta_description}}">
                                                            {{$product->meta_description}}
                                                           </textarea>
                                                           @error('meta_description')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="meta_image"> Meta Image</label>
                                                        <div class="col-md-9">
                                                            <input type="file" id="meta_image" name="meta_image" class="form-control">
                                                            @error('meta_image')<span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>

                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </div>

                                    </div> <!-- tab-content -->
                                </div> <!-- end #basicwizard-->


                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>
             </div>
            <!-- .............................. -->
        </div>
        <div class="col-lg-3">
            <div class="card px-1 py-1">
                <button type="submit" class="btn btn-primary w-100">Update</button>
            </div>
            <!-- ......................................... -->
                <div class="card">
                    <div class="card-body">
                    <h5 class="border-bottom pb-1">Product Categories</h5>

                        <select name="product_categories[]" id="" class="form-control" multiple>
                        @foreach ($product_category as $category)
                            <option value="{{ $category->id }}" {{ $product->categories->contains($category->id) ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_categories')<span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                </div>
            <!-- ....................................... -->
              <!-- .................product gallery........................ -->
              <div class="card">
                <div class="card-body">
                   <h5 class="border-bottom pb-1">Edit Product Image</h5>
                   <div class="product_image border mb-2 text-center">
                        <img src="{{ asset('photos/image/' . $product->product_image) }}" alt="{{ $product->product_name }}" width="200px">
                    </div>
                   <input type="file" name="product_image">
                    @error('product_image')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
              </div>
              <!-- ................................ -->
             <!-- ........................................ -->
             <div class="card">
              <div class="card-body">
                 <h5 class="border-bottom pb-1">Edit Visual Image</h5>
                 <div class="visual_images border mb-2 p-2">
                    @if ($product->visual_image)
                        @php
                            $visualImages = json_decode($product->visual_image, true);
                        @endphp
                        @if (is_array($visualImages) && !empty($visualImages))
                            @foreach ($visualImages as $image)
                                <img src="{{ asset('photos/image/' . $image) }}" alt="Visual image" class="img-fluid border mb-2" width="100px">
                            @endforeach
                        @else
                            <p>No visual images available</p>
                        @endif
                    @else
                        <p>No visual images available</p>
                    @endif
                </div>
                    <input type="file" name="visual_image[]" multiple>
                    @error('visual_image')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
            </div>
        </div>
    </div>
    </form>

</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('backend/editor/quill.core.css')}}">
<link rel="stylesheet" href="{{ asset('backend/editor/quill.bubble.css')}}">
<link rel="stylesheet" href="{{ asset('backend/editor/quill.snow.css')}}">
@endpush

@push('js')
<script src="{{ asset('backend/editor/quill.min.js')}}"></script>
<script src="{{ asset('backend/editor/form-quilljs.init.js')}}"></script>
<script src="{{ asset('backend/editor/jquery.bootstrap.wizard.min.js')}}"></script>
<script src="{{ asset('backend/editor/form-wizard.init.js')}}"></script>
<script>
    var quill = new Quill('#snow-editor', {
    });
   quill.on('text-change', function(delta, oldDelta, source) {
        document.getElementById("quill_html").value = quill.root.innerHTML;
    });
</script>
<script>
    function generateSlug(text) {
    return text
        .toString()                    // Convert to string
        .toLowerCase()                 // Convert to lowercase
        .trim()                        // Remove leading and trailing spaces
        .replace(/\s+/g, '-')          // Replace spaces with hyphens
        .replace(/[^\w\-]+/g, '')      // Remove all non-word characters
        .replace(/\-\-+/g, '-')        // Replace multiple hyphens with a single hyphen
        .replace(/^-+/, '')            // Remove hyphens from the beginning
        .replace(/-+$/, '');           // Remove hyphens from the end
}

// Attach the blur event listener to the title input
document.getElementById('product_name').addEventListener('blur', function() {
    const title = this.value;
    const slug = generateSlug(title);
    document.getElementById('product_slug').value = slug;
});
 </script>
@endpush
