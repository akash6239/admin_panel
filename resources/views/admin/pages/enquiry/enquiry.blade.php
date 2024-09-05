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
               <strong>{{ session('status') }}</strong>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
             @else
             <h5 class="px-1 py-1 ">View Enquiries</h5>
           @endif
       </div>
   </div>

   <div class="row">
       <div class="card px-3 py-3">
       <table id="example" class="display nowrap" style="width:100%">
       <thead>
           <tr>
               <th>S.N.</th>
               <th>Name</th>
               <th>Email</th>
               <th>Phone No</th>
               <th>City</th>
               <th>Drug Licence</th>
               <th>GST</th>
               <th>Message</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($enquiry as $key => $data )
           <tr>
               <td>{{$key + 1}}</td>
               <td>{{ $data->name }}</td>
               <td>{{$data->email}}</td>
               <td>{{$data->phone}}</td>
               <td>{{$data->city}}</td>
               <td>
                @if($data->drug)
                    <span class="badge text-bg-success">yes</span>
                @else
                    <span class="badge text-bg-danger">No</span>
                @endif
               </td>
               <td>
                @if($data->gst)
                    <span class="badge text-bg-success">yes</span>
                @else
                    <span class="badge text-bg-danger">No</span>
                @endif
               </td>
               <td>{{$data->message}}</td>
               <td>
                   <div class="btn-group" role="group" aria-label="Basic example">
                       <a href="{{ route('delete.enquiry', $data->id) }}" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirmDelete(this);">
                           Delete
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
