

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
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #233b66;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="text-white" >مشترياتي</h2>
                            <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> العودة
                            </a>
                        </div>

                        <div class="row">
                            <?php if($purchases->count() > 0): ?>
                                <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-2 mb-3">
                                        <div class="card h-100">
                                            <img src="<?php echo e(asset($purchase->product->image)); ?>" class="card-img-top" alt="<?php echo e($purchase->product->name); ?>" style="width: 225px; height: 200px; object-fit: cover;">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo e($purchase->product->name); ?></h5>
                                                <p class="card-text">تم الشراء: <?php echo e($purchase->created_at->format('Y-m-d')); ?></p>
                                                <form action="<?php echo e(route('deletePurchase', $purchase->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger">
                                                        حذف واسترجاع النقاط
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <div class="col-12">
                                    <div class="alert alert-info" style="color: #e30505; background-color: #9fa9c0; font-weight: bold;">
                                        لا توجد مشتريات حتى الآن
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if(session('message')): ?>
                                      <div class="alert alert-success mt-4" style="color: #ffffff; font-weight: bold; background-color: #00d13b; border-radius: 10px;">
                                          <?php echo e(session('message')); ?>

                                      </div>
                                  <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php /**PATH C:\Users\LENOVO\Desktop\maps\task1\resources\views/profile/hasan/purchases.blade.php ENDPATH**/ ?>