<div>
<div class="row bg-white px-3 p-3">
        <div class="col-lg-12">
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
        <form wire:submit.prevent="save">
            <input type="file" wire:model="photos" multiple>
            <button type="submit " class="btn btn-primary">Save Photo</button>
            <?php $__errorArgs = ['photos.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </form>
  </div>
</div>

<div class="row showallimages mt-2 bg-white border py-2 px-3" >
          <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-2">
                  <div class="mx-1 mt-2 border p-1 image-overview">
                   <img src="<?php echo e(asset('photos/image/'.$file)); ?>"  alt="Image" class="fileuploadcls">
                   <div class="imageabou">
                     <span class="bg-primary text-white p-1">Preview</span>
                     <span class="bg-danger text-white p-1" wire:click="delete('<?php echo e($file); ?>')">Delete</span>
                  </div>
                  </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

</div>
<?php /**PATH E:\html code\New folder\rednirus_cms\resources\views\livewire\file-upload.blade.php ENDPATH**/ ?>