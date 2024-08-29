@extends('admin.layout.sidebar')
@section('content')
<div class="container mt-2">
    <div class="row px-2">
        <div class=" py-1">
            @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @else
                <h4>Add New Product</h4>
            @endif
        </div>
    </div>

    <form action="{{route('product')}}" method="post" enctype="multipart/form-data"> @csrf
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card px-2 py-2">
                        <div class="mb-3">
                            <label for="example-input-normal" class="form-label">Product Name</label>
                            <input type="text" id="product_name" name="product_name" class="form-control" value="{{ old('product_name') }}" placeholder="Product Name">
                            @error('product_name')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card px-2 py-2">
                        <div class="mb-3">
                            <label for="example-input-normal" class="form-label">Slug</label>
                            <input type="text" id="slug" name="product_slug" class="form-control" value="{{ old('product_slug') }}" placeholder="Product Slug">
                            @error('product_name')<div class="text-danger mt-2">{{ $message }}</div>@enderror
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
                           @error('description')<div class="text-danger mt-2">{{ $message }}</div>@enderror
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
                                                            <input type="text" id="sku" name="sku" class="form-control">
                                                            @error('sku')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="regular_price">Regular price (₹)</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="regular_price" name="regular_price">
                                                            @error('regular_price')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="sale_price"> Sale price (₹)</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="sale_price" name="sale_price" class="form-control">
                                                            @error('sale_price')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="product_packaging"> Product Packaging</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="product_packaging" name="product_packaging" class="form-control">
                                                            @error('product_packaging')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="product_composition"> Product Composition</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="product_composition" name="product_composition" class="form-control">
                                                            @error('product_composition')<div class="text-danger mt-2">{{ $message }}</div>@enderror
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
                                                            <input type="text" id="meta_title" name="meta_title" class="form-control">
                                                            @error('meta_title')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="meta_keywords">Meta Keywords</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords">
                                                            @error('meta_keywords')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="meta_description"> Meta Description</label>
                                                        <div class="col-md-9">
                                                           <textarea name="meta_description" id="" class="form-control">

                                                           </textarea>
                                                           @error('meta_description')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="meta_image"> Meta Image</label>
                                                        <div class="col-md-9">
                                                            <input type="file" id="meta_image" name="meta_image" class="form-control">
                                                            @error('meta_image')<div class="text-danger mt-2">{{ $message }}</div>@enderror
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
                <button type="submit" class="btn btn-primary w-100">Publish</button>
            </div>
            <!-- ......................................... -->
            <div class="card">
                <div class="card-body">
                    <h5 class="border-bottom pb-1">Product Categories</h5>
                    <div class="category_list_box border px-2 py-2">
                        <select name="product_categories[]" id="product_categories" class="form-control" multiple>
                            @foreach ($product_category as $data)
                                <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- ....................................... -->
             <!-- ........................................ -->
             <div class="card">
              <div class="card-body">
                 <h5 class="border-bottom pb-1">Product Image</h5>

                  <div class="product_image border p-2">
                    <input type="hidden" name="product_image">
                    {{-- <label for="example-input-normal" class="form-label">Image : </label> --}}
                    <input type="file" id="image" name="product_image" class="form-control">
                    @error('product_image')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    {{-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-zIzPCo2-0ZTKBMFBpVciRU5jP57eDCrbK4BCMGga0CLnqzU2UL_b8pkxDvZjpdEcmC4&usqp=CAU" alt="not found" class="w-100"> --}}
                 </div>
              </div>
            </div>
            <!-- .................product gallery........................ -->
            {{-- <div class="card">
              <div class="card-body">
                 <h5 class="border-bottom pb-1">Product Gallery</h5>

                 <input type="hidden" name="product_gallery">
                 @error('product_gallery')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                  <div class="product_image border">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-zIzPCo2-0ZTKBMFBpVciRU5jP57eDCrbK4BCMGga0CLnqzU2UL_b8pkxDvZjpdEcmC4&usqp=CAU" alt="not found" class="w-100">
                 </div>
              </div>
            </div> --}}
            <!-- ................................ -->
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
    document.getElementById('slug').value = slug;
});
 </script>
@endpush
