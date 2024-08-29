@extends('admin.layout.sidebar')
@section('content')
<div class="container mt-2">
     <div class="row px-2">
        <div class="py-1">
            @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @elseif(session('error'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
                <h5 class="px-1 py-1 text-danger">{{ session('error') }}</h5>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="card px-2 py-2">
        <ul class="button-groupp-rds text-start">
            <li><a href="{{route('product')}}" class="btn btn-primary btn-sm px-3 py-2">Add New Product</a></li>
            <li class="px-5">

            <form class="border" action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8 p-0">
                        <input type="file" name="file" class="form-control px-3 py-2"/>
                    </div>
                    <div class="col-lg-4 p-0">
                        <button type="submit" class="btn btn-success w-100 px-3 py-2">Upload CSV</button>
                    </div>
                </div>
            </form>

            </a></li>
            <li><a href="" class="btn btn-light btn-sm px-3 py-2 text-end">Export CSV</a></li>
        </ul>
        </div>
    </div>


    <div class="row">
        <div class="card px-3 py-3">
        <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Packaging</th>
                <th>Composition</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $data )
            <tr>
                <td>{{$key + 1}}</td>
                <td>
                    <img src="{{asset('photos/image/'.$data->product_image)}}" alt="{{ $data->product_name }}" srcset="" width="50" height="50" >
                </td>
                <td>{{$data->product_name}}</td>
                <td>
                    @foreach ($data->categories as $item2)
                        <span class="badge text-bg-primary">{{$item2->category_name}}</span>
                    @endforeach
                </td>
                <td>{{$data->product_packaging}}</td>
                <td>{{$data->product_composition}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('product.edit', $data->id) }}" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('product.delete', $data->id) }}" 
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
