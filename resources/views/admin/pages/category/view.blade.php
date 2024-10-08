@extends('admin.layout.sidebar')
@section('content')
<div class="container-fluid mt-3">
<!-- Start Content-->
        <div class="row mt-3 px-2">
            <div class="card px-2 py-1">
                @if(session('status'))
                <h5 class="px-1 py-1 text-success">{{ session('status') }}</h5>
                @else
                    <h4>Dashboard / categories</h4>
                @endif
            </div>
        </div>


        <div class="row">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h4>Add New Category</h4>
                        <p class="sub-header">
                        categories for your store can be managed here.
                        </p>

                        <form action="{{route('category')}}" method="post" enctype="multipart/form-data">@csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="example-input-normal" class="form-label">Name</label>
                                    <input type="text" id="category_name" class="form-control" name="category_name" value="{{ old('category_name') }}">
                                    @error('category_name') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-input-normal" class="form-label">Slug</label>
                                        <input type="text" id="slug" class="form-control" name="slug" value="{{ old('category_name') }}">
                                        @error('slug') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                <div class="mb-3">
                                <label for="example-input-normal" class="form-label">Type</label>
                                    <select  id="category_type" class="form-control" name="category_type" >
                                        <option value="None" class="py-2">None</option>
                                        <option value="Products" class="py-2">Products</option>
                                        <option value="Blog">Blogs</option>
                                        <option value="Pages">Pages</option>
                                    </select>
                                    @error('category_type') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span> @enderror
                                </div>
                                </div>

                            <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-input-normal" class="form-label">Meta Title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title') }}">
                                        @error('meta_title') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-input-normal" class="form-label">Meta Keyword</label>
                                        <input type="text" class="form-control"  id="meta_keyword" name="meta_keyword" value="{{ old('meta_keyword') }}">
                                        @error('meta_keyword') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="example-textarea" class="form-label">Meta Description</label>
                                    @error('meta_description') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span>  @enderror
                                    <textarea class="form-control" id="meta_description" rows="5" name="meta_description">{{ old('meta_description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="example-input-normal" class="form-label">Image : </label>
                                    <input type="file" id="name" name="category_image" value="{{ old('category_image') }}">
                                    @error('category_image') <span class="error" style="color:red; font-size:14px;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                            <input type="submit" class="btn btn-primary btn-lg px-5" value="Add" />
                                    </div>
                                </div>
                        </div>
                        <!-- end roe -->

                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">

   <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Type</th>
                <th>Date</th>
                <th>Action</th>


            </tr>
        </thead>
        <tbody>

         @foreach($categories as $key => $data)
            <tr>
                <td>{{$key + 1}}</td>
                
                <td class="text-start px-2"><img src="{{asset('photos/image/'.$data->category_image)}}" alt="" srcset="" width="30" height="30"></td>

                <td>{{ $data->category_name}}</td>
                <td>{{$data->slug}}</td>
                <td>{{$data->category_type}}</td>
                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('categories.edit', $data->id) }}" class="btn btn-primary p-1"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('categories.destroy', $data->id) }}" class="btn btn-danger p-1"><i class="fa fa-trash"></i></a>

                </td>

            </tr>
          @endforeach
        </tbody>
    </table>

    </div>
    </div>
    </div>

</div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('backend/datatables/dataTables.dataTables.css')}}">
<link rel="stylesheet" href="{{asset('backend/datatables/responsive.dataTables.css')}}">
@endpush

@push('js')
<script src="{{asset('backend/datatables/jquery-3.7.1.slim.min.js')}}"></script>
 <script src="{{asset('backend/datatables/dataTables.js')}}"></script>
 <script src="{{asset('backend/datatables/dataTables.responsive.js')}}"></script>
 <script src="{{asset('backend/datatables/responsive.dataTables.js')}}"></script>
 <script>
    new DataTable('#example', {
    responsive: true,
    bLengthChange: false,
    // info: false
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
document.getElementById('category_name').addEventListener('blur', function() {
    const title = this.value;
    const slug = generateSlug(title);
    document.getElementById('slug').value = slug;
});
 </script>
@endpush
