<?php if (isset($component)) { $__componentOriginalbf020ec425b6d0b9fddc69f3baf70e3e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf020ec425b6d0b9fddc69f3baf70e3e = $attributes; } ?>
<?php $component = App\View\Components\TeacherAppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('teacher-app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TeacherAppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Teacher Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <?php echo e(__("You're logged in!")); ?>

                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf020ec425b6d0b9fddc69f3baf70e3e)): ?>
<?php $attributes = $__attributesOriginalbf020ec425b6d0b9fddc69f3baf70e3e; ?>
<?php unset($__attributesOriginalbf020ec425b6d0b9fddc69f3baf70e3e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf020ec425b6d0b9fddc69f3baf70e3e)): ?>
<?php $component = $__componentOriginalbf020ec425b6d0b9fddc69f3baf70e3e; ?>
<?php unset($__componentOriginalbf020ec425b6d0b9fddc69f3baf70e3e); ?>
<?php endif; ?>
<?php /**PATH D:\laravel-11-multi-auth-main\resources\views\teacher\dashboard.blade.php ENDPATH**/ ?>