
<?php $__env->startSection('content'); ?>
<div class="container mt-2">
    <div class="card row px-2">
       <div class="py-1">
           <?php if(session('status')): ?>
           <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong><?php echo e(session('status')); ?></strong>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
           <?php elseif(session('error')): ?>
           <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong><?php echo e(session('status')); ?></strong>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
             <?php else: ?>
             <h5 class="px-1 py-1 ">View Enquiries</h5>
           <?php endif; ?>
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
           <?php $__currentLoopData = $enquiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
               <td><?php echo e($key + 1); ?></td>
               <td><?php echo e($data->name); ?></td>
               <td><?php echo e($data->email); ?></td>
               <td><?php echo e($data->phone); ?></td>
               <td><?php echo e($data->city); ?></td>
               <td>
                <?php if($data->drug): ?>
                    <span class="badge text-bg-success">yes</span>
                <?php else: ?>
                    <span class="badge text-bg-danger">No</span>
                <?php endif; ?>
               </td>
               <td>
                <?php if($data->gst): ?>
                    <span class="badge text-bg-success">yes</span>
                <?php else: ?>
                    <span class="badge text-bg-danger">No</span>
                <?php endif; ?>
               </td>
               <td><?php echo e($data->message); ?></td>
               <td>
                   <div class="btn-group" role="group" aria-label="Basic example">
                       <a href="<?php echo e(route('delete.enquiry', $data->id)); ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirmDelete(this);">
                           Delete
                        </a>
                     </div>
               </td>
               </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </tbody>
   </table>
       </div>
   </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/datatables/dataTables.dataTables.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/datatables/responsive.dataTables.css')); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo e(asset('backend/datatables/jquery-3.7.1.slim.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/datatables/dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('backend/datatables/dataTables.responsive.js')); ?>"></script>
<script src="<?php echo e(asset('backend/datatables/responsive.dataTables.js')); ?>"></script>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\html code\New folder\rednirus_cms\resources\views\admin\pages\enquiry\enquiry.blade.php ENDPATH**/ ?>