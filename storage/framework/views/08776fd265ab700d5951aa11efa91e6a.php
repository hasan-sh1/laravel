

<head>
<link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="../assets/css/demo.css" />
</head>
<?php
          $userPoints1 = DB::table('user_points')
              ->where('user_id', Auth::id())
              ->value('points');
      ?>
                <div class="card" style="background-color: #233b66;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="text-white"   >متجر الكروت</h2>
                            <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> العودة
                            </a>
                        </div>

                        <div class="alert alert-info" style="color: #e30505; background-color: #9fa9c0; font-weight: bold;">
                            points: <span><?php echo e($userPoints1 ?? 0); ?></span>
                        </div>

                        <div class="row">
                            <?php $__currentLoopData = App\Models\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-2 mb-3">
                                    <div class="card h-100" style="background-color: #dedede; border-radius: 10px;">
                                        <img src="<?php echo e(asset($product->image)); ?>" class="card-img-top" alt="<?php echo e($product->name); ?>" style="width: 225px; height: 200px; object-fit: cover;">
                                        
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                            <p class="card-text"><?php echo e($product->description); ?></p>
                                            <p class="card-text">السعر: <?php echo e($product->price); ?> نقاط</p>
                                            <form action="<?php echo e(route('buyProduct', $product->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-primary">شراء</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        
                        <?php if(session('message')): ?>
                                      <div class="alert alert-success mt-4" style="color: #ffffff; font-weight: bold; background-color: #00d13b; border-radius: 10px;">
                                          <?php echo e(session('message')); ?>

                                      </div>
                                  <?php endif; ?>
                    </div>
                </div>
<?php /**PATH C:\Users\LENOVO\Desktop\maps\task1\resources\views/profile/hasan/shop.blade.php ENDPATH**/ ?>