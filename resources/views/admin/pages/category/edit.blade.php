@extends('admin.layout.sidebar')
@section('content')
<div class="container-fluid mt-3">
<!-- Start Content-->
<div class="row mt-3 px-2">
    <div class="card px-2 py-1">
        @if(session('status'))
        <h4 class="bg-success px-1 py-1 text-white">{{ session('status') }}</h4>
        @else
            <h4>Update category</h4>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4>Update Category</h4>
                <p class="sub-header">
                categories for your store can be managed here. 
                To change the order of categories on the front-end you can drag and drop to 
                sort them. To see more categories listed click the "screen options" link at 
                the top-right of this page.
                </p>

                <form action="{{route('categoriesupdate')}}" method="post" enctype="multipart/form-data"> @csrf
                    <div class="row">
                        <div class="col-lg-6">
                                <div class="mb-3">
                                <label for="example-input-normal" class="form-label">Name</label>
                                <input type="hidden" value="{{$category->id}}" name="id"/>
                                <input type="text" id="category_name" name="category_name" class="form-control" value="{{ $category->category_name}}">
                                {!! $errors->first('category_name', '<p style="color:red; font-size:14px;">:message</p>') !!}
                            </div>
                        </div>

                        <div class="col-lg-6">
                        <div class="mb-3">
                            <input type="hidden" value="products" name="category_type">
                                <label for="example-input-normal" class="form-label">Slug</label>
                                <input type="text" id="slug" name="slug" class="form-control" value="{{$category->category_name}}">
                                {!! $errors->first('slug', '<p style="color:red; font-size:14px;">:message</p>') !!}
                            </div>
                        </div>


                        <div class="col-lg-6">
                        <div class="mb-3">
                                <label for="example-input-normal" class="form-label">Type</label>
                                <select name="category_type" id="example-select" class="form-select">
                                    <option value="{{ $category->category_type }}">{{$category->category_type}}</option>
                                </select>
                                {!! $errors->first('category_type', '<p style="color:red; font-size:14px;">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                                 <div class="mb-3">
                                        <label for="example-input-normal" class="form-label">Meta Title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{$category->meta_title}}">
                                        @error('meta_title') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span> @enderror
                                    </div>
                        </div>
                        <div class="col-lg-12">
                                 <div class="mb-3">
                                        <label for="example-input-normal" class="form-label">Meta Keyword</label>
                                        <input type="text" class="form-control"  id="meta_keyword" name="meta_keyword"  value="{{$category->meta_keyword}}">
                                        @error('meta_keyword') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span> @enderror
                                    </div>
                        </div>
                        <div class="col-lg-12">
                               <div class="mb-3">
                                    <label for="example-textarea" class="form-label">Meta Description</label>
                                    @error('meta_description') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span>  @enderror
                                    <textarea class="form-control" id="meta_description" rows="5" name="meta_description">{{$category->meta_description}}</textarea>
                                </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                    <label for="example-input-normal" class="form-label">Image : </label>
                                    <input type="file" id="name" name="category_image">
                                    @error('category_image') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span> @enderror
                                </div>
                        </div>
                    </div>
                    


                    
                   
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary btn-lg px-5" value="Update" />
                    </div>

                    
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->

</div>
</div>
@endsection

@push('js')
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
document.getElementById('category_name').addEventListener('blur', function() {
    const title = this.value;
    const slug = generateSlug(title);
    document.getElementById('slug').value = slug;
});
 </script>
@endpush