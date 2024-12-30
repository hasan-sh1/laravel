
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
                <div class="card" style="background-color: #052260; border-radius: 10px;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="text-white" >الألغاز</h2>
                            <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> العودة
                            </a>
                        </div>

                        <div class="alert alert-info" style="color: #e30505; background-color: #9fa9c0; font-weight: bold;">
                            points: <span><?php echo e($userPoints1 ?? 0); ?></span>
                        </div>

                        <div class="row">
                            <?php $__currentLoopData = App\Models\Puzzle::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puzzle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title " style="color: #131313; font-weight: bold;">لغز #<?php echo e($puzzle->id); ?></h5>
                                            <p class="card-text" style="color: #131313; font-weight: bold;"><?php echo e($puzzle->question); ?></p>
                                            <form action="<?php echo e(route('checkPuzzle', $puzzle->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control " style="color: #131313; font-weight: bold;" name="answer" placeholder="أدخل الإجابة">
                                                </div>
                                                <button type="submit" class="btn btn-primary">تحقق من الإجابة</button>
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
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\LENOVO\Desktop\maps\task1\resources\views/profile/hasan/puzzles.blade.php ENDPATH**/ ?>