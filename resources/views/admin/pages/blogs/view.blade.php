@extends('admin.layout.sidebar')
@section('content')
<div class="container mt-2">
     <div class="card row px-2">
        <div class="py-1">
            @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @elseif(session('error'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @else
            <h5 class="px-1 py-1">Dashboard / View Blogs</h5>
            @endif
        </div>
    </div>


    <div class="row">
        <div class="card px-3 py-3">
        <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Image</th>
                <th>Blog Name</th>
                <th>Category</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $key => $data )
            <tr>
                <td>{{$key + 1}}</td>
                <td>
                    <img src="{{asset('photos/image/'.$data->image)}}" alt="{{ $data->blog_name }}" srcset="" width="50" height="50" >
                </td>
                <td>{{$data->blog_name}}</td>
                <td>
                    @foreach ($data->categories as $item2)
                        <span class="badge rounded-pill text-bg-primary">{{$item2->category_name}}</span>
                    @endforeach
                </td>
                <td>{{$data->slug}}</td>
                <td>
                    @if($data->status)
                        <a href="{{ route('blogchange.status',$data->id) }}" onclick="return confirm('Are you sure you want to change status of this Blog?')" class="badge text-bg-success">Active</a>
                    @else
                        <a href="{{ route('blogchange.status',$data->id) }}" onclick="return confirm('Are you sure you want to change status of this Blog?')" class="badge text-bg-danger">Inactive</a>
                    @endif
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('blog.edit',$data->id) }}" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('blog.delete',$data->id) }}" 
                            class="btn btn-danger btn-sm"
                            onclick="return confirmDelete(this);">
                             <i class="fa fa-trash"></i>
                         </a>
                      </div>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>

</div>
 @endsection

 @push('css')
 <link rel="stylesheet" href="{{asset('backend/datatables/dataTables.dataTables.css')}}">
 <link rel="stylesheet" href="{{asset('backend/datatables/responsive.dataTables.css')}}">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

 @endpush

 @push('js')
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="{{asset('backend/datatables/jquery-3.7.1.slim.min.js')}}"></script>
 <script src="{{asset('backend/datatables/dataTables.js')}}"></script>
 <script src="{{asset('backend/datatables/dataTables.responsive.js')}}"></script>
 <script src="{{asset('backend/datatables/responsive.dataTables.js')}}"></script>
 <script>
    new DataTable('#example', {
        responsive: true
    });
 </script>
 <script>
    function confirmDelete(link) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, navigate to the link's href
                window.location.href = link.href;
            }
        });
        // Prevent default action
        return false;
    }
</script>
 @endpush
