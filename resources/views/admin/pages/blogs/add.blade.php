@extends('admin.layout.sidebar')
@section('content')
<div class="container mt-2">
    <div class="row px-2">
        <div class="card  py-1">
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
                <h5>Dashboard / Add New Blog</h5>
            @endif
        </div>
    </div>

    <form action="{{ route('blogs') }}" method="post" enctype="multipart/form-data"> 
        @csrf
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card px-2 py-2">
                        <div class="mb-3">
                            <label for="example-input-normal" class="form-label">Blog Name</label>
                            <input type="text" id="blog_name" name="blog_name" class="form-control" value="{{ old('blog_name') }}" placeholder="Blog Name">
                            @error('blog_name')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card px-2 py-2">
                        <div class="mb-3">
                            <label for="example-input-normal" class="form-label">Blog Slug</label>
                            <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="Blog Slug">
                            @error('slug')<div class="text-danger mt-2">{{ $message }}</div>@enderror
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

                            <h2 class=" header-title mb-3"> Blog SEO</h2>
                                <div id="basicwizard">
                                    <div class="tab-content b-0 mb-0 pt-0">
                                        <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12">

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


                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </div>




                                        <div class="tab-pane" id="basictab2" role="tabpanel">
                                        

                                    </div> <!-- tab-content -->
                                </div> <!-- end #basicwizard-->


                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>
             </div>
            <!-- .............................. -->
        </div>
        <div class="col-lg-3">
            <!-- ......................................... -->
            <div class="card">
                <div class="card-body">
                    <h5 class="border-bottom pb-1">Select Category*</h5>
                    <div class="category_list_box border px-2 py-2">
                        <select name="blog_categories[]" id="blog_categories" class="form-control" multiple>
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
                 <h5 class="border-bottom pb-1">Blog Image</h5>

                  <div class="product_image border p-2">
                    <input type="file" id="image" name="image" class="form-control">
                    @error('image')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                 </div>

                 <h5 class="border-bottom pb-1">Blog Image Alt</h5>

                 <div class="product_image border p-2">
                   <input type="text" id="alt" name="blog_alt" class="form-control">
                   @error('blog_alt')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                </div>
              </div>
            </div>
            <div class="card px-1 py-1">
                <button type="submit" class="btn btn-primary w-100">Add Blog</button>
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
    document.addEventListener('DOMContentLoaded', function() {
        var quill = new Quill('#snow-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    ['link'],
                    ['clean']
                ]
            }
        });

        // Sync editor content with hidden input field
        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById("quill_html").value = quill.root.innerHTML;
        });
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
document.getElementById('blog_name').addEventListener('blur', function() {
    const title = this.value;
    const slug = generateSlug(title);
    document.getElementById('slug').value = slug;
});
 </script>
@endpush
