<?php $__env->startSection('conteudo'); ?>
<h2 class="text-left text-white"><?php echo e($categoria->id==0 ? 'Cadastro' : 'Alteração'); ?> de Categoria</h2>
<div class="linha-list-veiculo mt-3 mb-3"></div>
<form action="<?php echo e(url('categoria/salvar')); ?>" method="post" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <div class="mb-3 <?php if($categoria->id==0): ?> d-none <?php endif; ?>">
    <label for="id" class="text-gray mb-1">ID</label>
    <input readonly readonly type="text" name="id" value="<?php echo e($categoria->id); ?>">
  </div>
  <div class="mb-3">
    <label for="id" class="text-gray mb-1">Descrição</label>
    <input class="<?php $__errorArgs = ['descricao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> value-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" placeholder="Informe a descrição" name="descricao" value="<?php echo e($categoria->descricao); ?>">
  </div>
  <button class="btn bg-orange btn-height-50" type="submit" name="button">Salvar</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\locadora\resources\views/frmCategoria.blade.php ENDPATH**/ ?>