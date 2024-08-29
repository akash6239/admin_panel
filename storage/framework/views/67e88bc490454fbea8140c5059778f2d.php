<?php $__env->startSection('content'); ?>
<div class="container mt-2">
    <div class="row px-2">
        <div class="card px-2 py-2">
            <h5>Edit Product</h5>
        </div>
    </div>

    <form action="<?php echo e(route('product')); ?>" method="post" enctype="multipart/form-data"> <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-lg-9">
            <div class="card px-2 py-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="example-input-normal" class="form-label">Product Name</label>
                            <input type="text" id="example-input-normal" name="product_name" class="form-control" value="<?php echo e($product->product_name); ?>">
                            <?php echo $errors->first('product_name', '<p style="color:red; font-size:14px;">:message</p>'); ?>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="example-input-normal" class="form-label">Product Slug</label>
                            <input type="text" id="example-input-normal" name="product_name" class="form-control" value="<?php echo e($product->product_slug); ?>">
                            <?php echo $errors->first('product_name', '<p style="color:red; font-size:14px;">:message</p>'); ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- ................editor............ -->
            <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Short Description</h4>
                            <div id="snow-editor" style="height: 200px;">
                                
                            </div> <!-- end Snow-editor-->
                            <input type="hidden" id="quill_html" name="description"></input>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div><!-- end col -->
            </div>
            </div>
            <!-- ................editor............ -->
            <!-- ..................basic product details................ -->
             <div class="card">
             <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mb-3"> Product Deta</h4>
                                <div id="basicwizard">

                                    <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-4" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a href="#basictab1" data-bs-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active" aria-selected="true" role="tab">
                                                <i class="fe-arrow-right me-1"></i>
                                                <span class="d-none d-sm-inline">Product Data</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a href="#basictab2" data-bs-toggle="tab" class="nav-link rounded-0 pt-2 pb-2" aria-selected="false" role="tab" tabindex="-1">
                                                <i class="fe-info me-1"></i>
                                                <span class="d-none d-sm-inline">SEO</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content b-0 mb-0 pt-0">

                                        <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12">

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="confirm">SKU</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="sku" name="sku" class="form-control" value="<?php echo e($product->sku); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="regular_price">Regular price (₹)</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="regular_price" name="regular_price" value="<?php echo e($product->regular_price); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="sale_price"> Sale price (₹)</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="sale_price" name="sale_price" class="form-control" value="<?php echo e($product->sale_price); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="product_packaging"> Product Packaging</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="product_packaging" name="product_packaging" class="form-control" value="<?php echo e($product->product_packaging); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="product_composition"> Product Composition</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="product_composition" name="product_composition" class="form-control" value="<?php echo e($product->product_composition); ?>">
                                                        </div>
                                                    </div>

                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </div>




                                        <div class="tab-pane" id="basictab2" role="tabpanel">
                                        <div class="row">
                                                <div class="col-12">

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="meta_title">Meta Title</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="meta_title" name="meta_title" class="form-control" value="<?php echo e($product->meta_title); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="meta_keywords">Meta Keywords</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="<?php echo e($product->meta_keywords); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="meta_description"> Meta Description</label>
                                                        <div class="col-md-9">
                                                           <textarea name="meta_description" id="" class="form-control" value="<?php echo e($product->meta_description); ?>">
                                                            <?php echo e($product->meta_description); ?>

                                                           </textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="meta_image"> Meta Image</label>
                                                        <div class="col-md-9">
                                                            <input type="file" id="meta_image" name="meta_image" class="form-control">
                                                        </div>
                                                    </div>

                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </div>

                                    </div> <!-- tab-content -->
                                </div> <!-- end #basicwizard-->


                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>
             </div>
            <!-- .............................. -->
        </div>
        <div class="col-lg-3">
            <div class="card px-1 py-1">
                <button type="submit" class="btn btn-primary w-100">Update</button>
            </div>
            <!-- ......................................... -->
                <div class="card">
                    <div class="card-body">
                    <h5 class="border-bottom pb-1">Product Categories</h5>

                        <select name="product_categories[]" id="" class="form-control" multiple>
                        <?php $__currentLoopData = $product_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e($product->categories->contains($category->id) ? 'selected' : ''); ?>>
                                <?php echo e($category->category_name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    </div>
                </div>
            <!-- ....................................... -->
              <!-- .................product gallery........................ -->
              <div class="card">
                <div class="card-body">
                   <h5 class="border-bottom pb-1">Product image</h5>
  
                   <input type="hidden" name="product_gallery">
                    <div class="product_image border">
                      <img src="<?php echo e(asset('photos/image/' . $product->product_image)); ?>" alt="<?php echo e($product->product_name); ?>" class="w-100">
                   </div>
                </div>
              </div>
              <!-- ................................ -->
             <!-- ........................................ -->
             <div class="card">
              <div class="card-body">
                 <h5 class="border-bottom pb-1">Edit Product Image</h5>
                    <input type="file" name="product_image[]" multiple>
              </div>
            </div>
        </div>
    </div>
    </form>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/editor/quill.core.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/editor/quill.bubble.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/editor/quill.snow.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('backend/editor/quill.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/editor/form-quilljs.init.js')); ?>"></script>
<script src="<?php echo e(asset('backend/editor/jquery.bootstrap.wizard.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/editor/form-wizard.init.js')); ?>"></script>
<script>
    var quill = new Quill('#snow-editor', {
    });
   quill.on('text-change', function(delta, oldDelta, source) {
        document.getElementById("quill_html").value = quill.root.innerHTML;
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\html code\New folder\rednirus_cms\resources\views/admin/pages/products/edit.blade.php ENDPATH**/ ?>