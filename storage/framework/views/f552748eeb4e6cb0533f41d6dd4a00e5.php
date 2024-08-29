
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-3">
   <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('file-upload', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-136873792-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<!-- ..............................script...... -->

<!-- ............................................. -->
<?php $__env->stopSection(); ?>
    
<?php $__env->startPush('css'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\html code\New folder\rednirus_cms\resources\views\admin\pages\media\view.blade.php ENDPATH**/ ?>