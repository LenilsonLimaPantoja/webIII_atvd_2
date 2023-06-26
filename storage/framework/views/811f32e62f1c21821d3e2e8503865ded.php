<?php $__env->startSection('conteudo'); ?>
<h2 class="text-left text-white"><?php echo e($locacao->id==0 ? 'Cadastrado' : 'Alteração'); ?> de Locação</h2>
<div class="linha-list-veiculo mt-3 mb-3 d-flex"></div>
<form action="<?php echo e(url('locacao/salvar')); ?>" method="post" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <div class="mb-3 <?php if($locacao->id==0): ?> d-none <?php endif; ?>">
    <label for="id" class="text-gray mb-1">ID</label>
    <input readonly type="text" name="id" value="<?php echo e($locacao->id); ?>">
  </div>


  <div class="mb-3">
    <label for="data_locacao" class="text-gray mb-1">Data Locacao</label>
    <input class="<?php $__errorArgs = ['data_locacao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="date" name="data_locacao" value="<?php echo e(old('data_locacao', $locacao->data_locacao)); ?>">
  </div>

  <div class="mb-3">
    <label for="data_entrega" class="text-gray mb-1">Data Entrega</label>
    <input class="<?php $__errorArgs = ['data_entrega'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="date" name="data_entrega" value="<?php echo e(old('data_entrega', $locacao->data_entrega)); ?>">
  </div>

  <div class="mb-3 <?php if($locacao->id==0): ?> d-none <?php endif; ?>">
    <label for="status" class="text-gray mb-1">status</label>
    <select class="<?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="status">
      <option <?php echo e($locacao->status != 2 ?'selected': ''); ?> value="1">Aberta</option>
      <option <?php echo e($locacao->status == 2 ?'selected': ''); ?> value="2">Fechada</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="cliente_id" class="text-gray mb-1">cliente</label>
    <select class="<?php $__errorArgs = ['cliente_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="cliente_id">
      <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option <?php echo e($cliente->id == old('cliente_id', $locacao->cliente_id) ?'selected': ''); ?> value="<?php echo e($cliente->id); ?> "><?php echo e($cliente->nome); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="veiculo_id" class="text-gray mb-1">veiculo</label>
    <select class="<?php $__errorArgs = ['veiculo_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="veiculo_id">
      <?php $__currentLoopData = $veiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $veiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option <?php echo e($veiculo->id == old('veiculo_id', $locacao->veiculo_id) ?'selected': ''); ?> <?php echo e($veiculo->status == 1 && $locacao->veiculo_id != $veiculo->id ? 'disabled': ''); ?> value="<?php echo e($veiculo->id); ?>"><?php echo e($veiculo->modelo); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>

  <button class="btn bg-orange btn-height-50" type="submit" name="button">Salvar</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\webIII_atvd_2\resources\views/frmLocacao.blade.php ENDPATH**/ ?>