<?php $__env->startSection('content'); ?>
<div class="container mt-2">
     <div class="row px-2">
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
                <h5 class="px-1 py-1 text-danger"><?php echo e(session('error')); ?></h5>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="card px-2 py-2">
        <ul class="button-groupp-rds text-start">
            <li><a href="<?php echo e(route('product')); ?>" class="btn btn-primary btn-sm px-3 py-2">Add New Product</a></li>
            <li class="px-5">

            <form class="border" action="<?php echo e(route('products.import')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
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
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($key + 1); ?></td>
                <td>
                    <img src="<?php echo e(asset('photos/image/'.$data->product_image)); ?>" alt="<?php echo e($data->product_name); ?>" srcset="" width="50" height="50" >
                </td>
                <td><?php echo e($data->product_name); ?></td>
                <td>
                    <?php $__currentLoopData = $data->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="badge rounded-pill text-bg-primary"><?php echo e($item2->category_name); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td><?php echo e($data->product_packaging); ?></td>
                <td><?php echo e($data->product_composition); ?></td>
                <td>
                    <?php if($data->status): ?>
                        <a href="<?php echo e(route('change.status',$data->id)); ?>" onclick="return confirm('Are you sure you want to change status of this Product?')" class="badge text-bg-success">Active</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('change.status',$data->id)); ?>" onclick="return confirm('Are you sure you want to change status of this Product?')" class="badge text-bg-danger">Inactive</a>
                    <?php endif; ?>
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?php echo e(route('product.edit', $data->id)); ?>" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="<?php echo e(route('product.delete', $data->id)); ?>" 
                            class="btn btn-danger btn-sm"
                            onclick="return confirmDelete(this);">
                             <i class="fa fa-trash"></i>
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

<?php echo $__env->make('admin.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\html code\New folder\rednirus_cms\resources\views/admin/pages/products/view.blade.php ENDPATH**/ ?>