

<?php $__env->startSection('content'); ?>
    <div class="container w-25 border p-4 mt-4">
        <form action="<?php echo e(route('todos-update', ['id' => $todo->id])); ?>" method="POST">
        <?php echo method_field('PATCH'); ?>   
        <?php echo csrf_field(); ?>

            <?php if(session('success')): ?>
            <h6 class="alert alert-success"><?php echo e(session('success')); ?></h6>
            <?php endif; ?>

            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <h6 class="alert alert-danger"><?php echo e($message); ?></h6>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>



        <div class="mb-3">
            <label for="title" class="form-label">Título de la tarea</label>
            <input type="text" name="title" class="form-control" value="<?php echo e($todo->title); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>  

    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\feuer\resources\views/todos/show.blade.php ENDPATH**/ ?>