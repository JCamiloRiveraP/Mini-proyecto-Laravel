


<?php $__env->startSection('content'); ?>
        <div class="container w-25 border p-4 my-4">
            <div class="row mx-auto">
            <form action="<?php echo e(route('categories.update')); ?>" method="POST">
            <?php echo method_field('PATCH'); ?>        
            <?php echo csrf_field(); ?>

                    <?php if(session('success')): ?>
                    <h6 class="alert alert-success"><?php echo e(session('success')); ?></h6>
                    <?php endif; ?>

                    <?php $__errorArgs = ['name'];
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
                    <label for="name" class="form-label">Nombre de la Categoría</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Color de la Categoría</label>
                    <input type="color" name="color" class="form-control">
                </div>


                <button type="submit" class="btn btn-primary">Crear nueva categoría</button>
                </form>  
                
                <div>
                    <?php if($category->todos->count() > 0): ?>
                     <?php $__currentLoopData = $category->todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row py-1">
                            <div class="col-md-9 d-flex align-items-center">
                                <a href="<?php echo e(route('todos-edit', ['id' => $todo->id])); ?>"><?php echo e($todo->title); ?></a>
                            </div>


                            <div class="col-md-3 d-flex justify-content-end">
                                <form action=" <?php echo e(route('todos-destroy', [$todo->id])); ?>" method="POST">
                                    <?php echo method_field('DELETE'); ?>
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                    <?php else: ?>

                    No hay tareas para esta categoría 

                    <?php endif; ?>
                </div>
            </div>
        </div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\feuer\resources\views/categories/show.blade.php ENDPATH**/ ?>