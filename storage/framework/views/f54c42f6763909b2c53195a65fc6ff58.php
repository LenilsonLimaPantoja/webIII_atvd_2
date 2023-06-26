<?php $__env->startSection('conteudo'); ?>
<h1 class="text-center">Cadastro de Locação</h1>
<hr style="border-bottom: solid; border-width: 1px" class="mb-3">
<?php if($locacao->imagem != ""): ?>
<img style="width: 200px;height:200px;object-fit:cover" src="/storage/imagens/<?php echo e($locacao->imagem); ?>">
<?php endif; ?>


<form action="<?php echo e(url('locacao/salvar')); ?>" method="post" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <div class="mb-3 <?php if($locacao->id==0): ?> d-none <?php endif; ?>">
    <label for="id" class="form-label">ID</label>
    <input readonly class="form-control" readonly type="text" name="id" value="<?php echo e($locacao->id); ?>">
  </div>
  <div class="mb-3">
    <label for="data_locacao" class="form-label text-capitalize">Data Locacao</label>
    <input class="form-control <?php $__errorArgs = ['data_locacao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="date" name="data_locacao" value="<?php echo e(old('data_locacao', $locacao->data_locacao)); ?>">
  </div>

  <div class="mb-3">
    <label for="data_entrega" class="form-label text-capitalize">Data Entrega</label>
    <input class="form-control <?php $__errorArgs = ['data_entrega'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="date" name="data_entrega" value="<?php echo e(old('data_entrega', $locacao->data_entrega)); ?>">
  </div>

  <div class="mb-3 <?php if($locacao->id==0): ?> d-none <?php endif; ?>">
    <label for="status" class="form-label text-capitalize">status</label>
    <select class="form-select <?php $__errorArgs = ['status'];
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
    <label for="cliente_id" class="form-label">cliente</label>
    <select class="form-select <?php $__errorArgs = ['cliente_id'];
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
    <label for="veiculo_id" class="form-label">veiculo</label>
    <select class="form-select <?php $__errorArgs = ['veiculo_id'];
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

  <button class="btn btn-success" type="submit" name="button">Salvar</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\webIII2023.1-Noturno\news\resources\views/frmLocacao.blade.php ENDPATH**/ ?>