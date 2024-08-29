@extends('admin.layout.sidebar')
@section('content')
<div class="container-fluid mt-3">
   <livewire:file-upload />
</div>
<!-- ..............................script...... -->

<!-- ............................................. -->
@endsection
    
@push('css')
<style>
   .fileuploadcls{
      width: 100%; 
      height:100px;
   }
   .image-overview{
      position: relative;
   }
   .imageabou{
      position: absolute;
      top:0;
      background:linear-gradient(0deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7));
      width: 100%;
      height:100%;
      text-align:center;
      padding-top:49%;
      visibility:hidden;
      transition: all 0.3s;
   }
   .imageabou span{
      cursor:pointer;
   }
   .image-overview:hover .imageabou{
      visibility:visible;
   }
</style>
@endpush
