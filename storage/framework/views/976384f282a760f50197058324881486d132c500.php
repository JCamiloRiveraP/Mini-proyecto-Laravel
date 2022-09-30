

<?php $__env->startSection('content'); ?>
    <div class="container w-25 border p-4 mt-4">
        <form action="<?php echo e(route('todos')); ?>" method="POST">
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
            <input type="text" name="title" class="form-control">
        </div>


        <label for="category_id" class="form-label">Categoría de la tarea</label>
        <select name="category_id" class="form-select">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>"> <?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
        </form>  
        
        <div>
            <?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a href="<?php echo e(route('todos-edit', ['id' => $todo->id])); ?>"><?php echo e($todo->title); ?> </a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                    <form action="<?php echo e(route ('todos-destroy', [$todo->id])); ?>" method="POST">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\feuer\resources\views/todos/index.blade.php ENDPATH**/ ?>