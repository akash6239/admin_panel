<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-body">
                <h4>Add New Category</h4>
                <p class="sub-header">
                categories for your store can be managed here.
                </p>

                <form wire:submit.prevent="submit">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="example-input-normal" class="form-label">Name</label>
                            <input type="text" id="category_name" class="form-control" wire:model.defer="category_name">
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
                                <input type="text" id="slug" class="form-control" wire:model.defer="slug" value="">
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
                            <select  id="category_type" class="form-control" wire:model.defer="category_type">
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
                                <input type="text" class="form-control" id="meta_title" wire:model.defer="meta_title">
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
                                <input type="text" class="form-control"  id="meta_keyword" wire:model.defer="meta_keyword">
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
                            <textarea class="form-control" id="meta_description" rows="5" wire:model.defer="meta_description"></textarea>
                        </div>
                    </div>
                      <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="example-input-normal" class="form-label">Image : </label>
                            <input type="file" id="name" wire:model="category_image">
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
                                        <?php if(session()->has('message')): ?>
                                            <div class="alert alert-success">
                                                <?php echo e(session('message')); ?>

                                            </div>
                                        <?php endif; ?>
                                        <?php if(session()->has('error')): ?>
                                            <div class="alert alert-danger">
                                                <?php echo e(session('error')); ?>

                                            </div>
                                        <?php endif; ?>
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
                <th>Action</th>
                <th>Image</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Type</th>
                <th>Date</th>


            </tr>
        </thead>
        <tbody>

         <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($key + 1); ?></td>
                <td>
                       <a href="" class="btn btn-primary p-1"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger p-1"><i class="fa fa-trash"></i></a>

                </td>

                <td class="text-start px-2"><img src="<?php echo e(asset('photos/image')); ?>/<?php echo e($data->category_image)); ?>" alt="" srcset="" width="30" height="30"></td>

                <td><?php echo e($data->category_name); ?></td>
                <td><?php echo e($data->slug); ?></td>
                <td><?php echo e($data->category_type); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($data->created_at)->format('d M Y')); ?></td>

            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>

<?php /**PATH E:\html code\New folder\rednirus_cms\resources\views\livewire\product-category.blade.php ENDPATH**/ ?>