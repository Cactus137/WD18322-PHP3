<?php $__env->startSection('title', 'Movies'); ?>

<?php $__env->startSection('content'); ?>
    <?php $__sessionArgs = ['success'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
        <div class="toast show mb-2 align-items-center text-white bg-success border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?php echo e(session('success')); ?>

                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    <?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>
    <?php $__sessionArgs = ['error'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
        <div class="toast show mb-2 align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?php echo e(session('error')); ?>

                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    <?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>
    <table class="table table-striped mt-5">
        <thead>
            <tr class="text-center">
                <th>#</th>
                <th>Poster</th>
                <th>Title</th>
                <th>Released</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="text-center">
                    <th scope="row"><?php echo e($movie->id); ?></th>
                    <td>
                        <img src="<?php echo e(asset('storage/public/movies/' . $movie->poster)); ?>" width="100" height="200"
                            class="img-thumbnail">
                    </td>
                    <td><?php echo e($movie->title); ?></td>
                    <td><?php echo e($movie->release_date); ?></td>
                    <td><?php echo e($movie->genre->name); ?></td>
                    <td class="">
                        <div class="d-flex justify-content-around align-items-center">
                            <a href="<?php echo e(route('movies.show', $movie->id)); ?>" class="btn btn-secondary">Detail</a>
                            <a href="<?php echo e(route('movies.edit', $movie->id)); ?>" class="btn btn-info">Edit</a>
                            <form action="<?php echo e(route('movies.destroy', $movie->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button onclick="return confirm('Are you sure delete this movie?')" type="submit"
                                    class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($movies->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cactus/Workspace/WD18322_PHP3/lab5/resources/views/movies/list.blade.php ENDPATH**/ ?>