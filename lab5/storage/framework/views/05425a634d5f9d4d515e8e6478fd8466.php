<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
</div>


<?php $__env->startSection('title', 'Movies'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card">
            <div class="card-header" style="background: white !important">

                <a href="<?php echo e(route('movies.list')); ?>" class="ms-2 text-decoration-none text-dark">
                    <i class="fa-solid fa-arrow-left-long"></i>
                    Back
                </a>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo e(asset('storage/public/movies/' . $movie->poster)); ?>" class="p-4 img-fluid rounded"
                        alt="<?php echo e($movie->title); ?>">
                </div>
                <div class="col-md-8 d-flex align-items-start"> 
                    <div class="py-3">
                        <p class="card-text h3 fw-bold mb-4"><?php echo e($movie->title); ?></p>
                        <p class="card-text fst-italic"><?php echo e($movie->intro); ?></p>
                        <p class="card-text"><strong>Released:</strong> <?php echo e($movie->release_date); ?></p>
                        <p class="card-text"><strong>Genre:</strong> <?php echo e($movie->genre->name); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cactus/Workspace/WD18322_PHP3/lab5/resources/views/movies/detail.blade.php ENDPATH**/ ?>