<?php $__env->startSection('conteudo'); ?>
<h1 class="text-center">Cadastro de Categoria</h1>
<hr style="border-bottom: solid; border-width: 1px" class="mb-3">
<form action="<?php echo e(url('categoria/salvar')); ?>" method="post" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <div class="mb-3 <?php if($categoria->id==0): ?> d-none <?php endif; ?>">
    <label for="id" class="form-label">ID</label>
    <input readonly class="form-control" readonly type="text" name="id" value="<?php echo e($categoria->id); ?>">
  </div>
  <div class="mb-3">
    <label for="id" class="form-label">Descrição</label>
    <input class="form-control <?php $__errorArgs = ['descricao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" placeholder="Informe a descrição" name="descricao" value="<?php echo e($categoria->descricao); ?>">
  </div>
  <button class="btn btn-success" type="submit" name="button">Salvar</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\webIII2023.1-Noturno\news\resources\views/frmCategoria.blade.php ENDPATH**/ ?>