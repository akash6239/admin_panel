<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-3">
<!-- Start Content-->
        <div class="row mt-3 px-2">
            <div class="card px-2 py-1">
                <?php if(session('status')): ?>
                <h5 class="px-1 py-1 text-success"><?php echo e(session('status')); ?></h5>
                <?php else: ?>
                    <h4>categories</h4>
                <?php endif; ?>
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

                        <form action="<?php echo e(route('category')); ?>" method="post" enctype="multipart/form-data"><?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="example-input-normal" class="form-label">Name</label>
                                    <input type="text" id="category_name" class="form-control" name="category_name" value="<?php echo e(old('category_name')); ?>">
                                    <?php $__errorArgs = ['category_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error" style="color:red; font-size:14px;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-input-normal" class="form-label">Slug</label>
                                        <input type="text" id="slug" class="form-control" name="slug" value="<?php echo e(old('category_name')); ?>">
                                        <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error" style="color:red; font-size:14px;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                    <?php $__errorArgs = ['category_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error" style="color:red; font-size:14px;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                </div>

                            <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-input-normal" class="form-label">Meta Title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" value="<?php echo e(old('meta_title')); ?>">
                                        <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error" style="color:red; font-size:14px;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-input-normal" class="form-label">Meta Keyword</label>
                                        <input type="text" class="form-control"  id="meta_keyword" name="meta_keyword" value="<?php echo e(old('meta_keyword')); ?>">
                                        <?php $__errorArgs = ['meta_keyword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error" style="color:red; font-size:14px;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="example-textarea" class="form-label">Meta Description</label>
                                    <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error" style="color:red; font-size:14px;"><?php echo e($message); ?></span>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <textarea class="form-control" id="meta_description" rows="5" name="meta_description"><?php echo e(old('meta_description')); ?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="example-input-normal" class="form-label">Image : </label>
                                    <input type="file" id="name" name="category_image" value="<?php echo e(old('category_image')); ?>">
                                    <?php $__errorArgs = ['category_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error" style="color:red; font-size:14px;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

         <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($key + 1); ?></td>
                
                <td class="text-start px-2"><img src="<?php echo e(asset('photos/image/'.$data->category_image)); ?>" alt="" srcset="" width="30" height="30"></td>

                <td><?php echo e($data->category_name); ?></td>
                <td><?php echo e($data->slug); ?></td>
                <td><?php echo e($data->category_type); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($data->created_at)->format('d M Y')); ?></td>
                <td>
                    <a href="<?php echo e(route('categories.edit', $data->id)); ?>" class="btn btn-primary p-1"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo e(route('categories.destroy', $data->id)); ?>" class="btn btn-danger p-1"><i class="fa fa-trash"></i></a>

                </td>

            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    </div>
    </div>
    </div>

</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/datatables/dataTables.dataTables.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/datatables/responsive.dataTables.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('backend/datatables/jquery-3.7.1.slim.min.js')); ?>"></script>
 <script src="<?php echo e(asset('backend/datatables/dataTables.js')); ?>"></script>
 <script src="<?php echo e(asset('backend/datatables/dataTables.responsive.js')); ?>"></script>
 <script src="<?php echo e(asset('backend/datatables/responsive.dataTables.js')); ?>"></script>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\html code\New folder\rednirus_cms\resources\views\admin\pages\category\view.blade.php ENDPATH**/ ?>