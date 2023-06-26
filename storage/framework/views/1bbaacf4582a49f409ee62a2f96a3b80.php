<?php $__env->startSection('conteudo'); ?>
<h2 class="text-left text-white"><?php echo e($veiculo->id==0 ? 'Cadastro' : 'Alteração'); ?> de Veiculo</h2>
<div class="linha-list-veiculo mt-3 mb-3 d-flex"></div>
<?php if($veiculo->imagem != ""): ?>
<img class="mb-5 mt-5 rounded" style="width: 300px;object-fit:cover;" src="/storage/imagens/<?php echo e($veiculo->imagem); ?>">
<?php endif; ?>

<form action="<?php echo e(url('veiculo/salvar')); ?>" method="post" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <div class="mb-3 <?php if($veiculo->id==0): ?> d-none <?php endif; ?>">
    <label for="id" class="text-gray mb-1">ID</label>
    <input class="<?php $__errorArgs = ['id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> value-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly type="text" name="id" value="<?php echo e($veiculo->id); ?>"">
  </div>

  <div class="mb-3">
    <label for="modelo" class="text-gray mb-1">Modelo</label>
    <input class="<?php $__errorArgs = ['modelo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> value-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" placeholder="Modelo do veículo" name="modelo" value="<?php echo e(old('modelo', $veiculo->modelo)); ?>">
  </div>

  <div class="mb-3">
    <label for="marca" class="text-gray mb-1">Marca</label>
    <input class="<?php $__errorArgs = ['marca'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> value-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="marca" value="<?php echo e(old('marca', $veiculo->marca)); ?>" placeholder="Marca do veículo">
  </div>

  <div class="mb-3">
    <label for="valor_dia" class="text-gray mb-1">Valor da diária</label>
    <input class="<?php $__errorArgs = ['valor_dia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> value-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="number" name="valor_dia" value="<?php echo e(old('marca', $veiculo->valor_dia)); ?>" placeholder="Valor da diária">
  </div>

  <div class="mb-3">
    <label for="placa" class="text-gray mb-1">Placa</label>
    <input class="<?php $__errorArgs = ['placa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> value-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="placa" value="<?php echo e(old('marca', $veiculo->placa)); ?>" placeholder="Placa">
  </div>

  <div class="mb-3">
    <label for="ano" class="text-gray mb-1">Ano</label>
    <input class="<?php $__errorArgs = ['ano'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> value-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="number" name="ano" value="<?php echo e(old('marca', $veiculo->ano)); ?>" placeholder="Ano do veículo">
  </div>

  <div class="mb-3">
    <label for="categoria_id" class="text-gray mb-1">Categoria</label>
    <select class="<?php $__errorArgs = ['categoria_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="categoria_id">
      <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option <?php echo e($categoria->id == old('categoria_id', $veiculo->categoria_id) ?'selected': ''); ?> value="<?php echo e($categoria->id); ?> "><?php echo e($categoria->descricao); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="arquivo" class="text-gray mb-1">Figura</label>
    <input class="<?php $__errorArgs = ['arquivo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> value-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" name="arquivo" accept="image/*">
  </div>

  <button class="btn bg-orange btn-height-50" type="submit" name="button">Salvar</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\locadora\resources\views/frmVeiculo.blade.php ENDPATH**/ ?>