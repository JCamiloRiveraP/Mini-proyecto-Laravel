


<?php $__env->startSection('content'); ?>
    <div class="container w-25 border p-4 my-4">
    <div class="row mx-auto">
    <form action="<?php echo e(route('categories.store')); ?>" method="POST">
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
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a class="d-flex align-items-center gap-2" href="<?php echo e(route('categories.show', ['category' => $category->id])); ?>">
                            <span class="color-container" style="background-color: <?php echo e($category->color); ?>;"></span> <?php echo e($category->name); ?>

                        </a>
                    </div>

                    <div class="col-md-3 d-flex justify-content-end">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-<?php echo e($category->id); ?>">
                     Eliminar
                    </button>
                </div>
            </div>

                    <!-- Modal -->
                        <div class="modal fade" id="modal-<?php echo e($category->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Al eliminar la categoría <strong><?php echo e($category->name); ?> </strong> se eliminan todas las tareas asignadas de la misma.
                                    ¿Está seguro que desea eliminar la categoría <strong><?php echo e($category->name); ?></strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <formm method="POST" action="<?php echo e(route('categories.destroy', ['category'=> $category->id ] )); ?>">
                                    <?php echo method_field('DELETE'); ?>
                                    <?php echo csrf_field(); ?>
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                </form>
                                
                            </div>
                            </div>
                        </div>
                        </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\feuer\resources\views/categories/index.blade.php ENDPATH**/ ?>