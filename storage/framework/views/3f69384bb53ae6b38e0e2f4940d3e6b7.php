<?php $__env->startSection('conteudo'); ?>
<h1 class="text-center">Cadastro de Veiculo</h1>
<hr style="border-bottom: solid; border-width: 1px" class="mb-3">
<?php if($veiculo->imagem != ""): ?>
<img style="width: 300px;object-fit:cover" class="rounded" src="/storage/imagens/<?php echo e($veiculo->imagem); ?>">
<?php endif; ?>

<form action="<?php echo e(url('veiculo/salvar')); ?>" method="post" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <div class="mb-3  <?php if($veiculo->id==0): ?> d-none <?php endif; ?>">
    <label for="id" class="form-label">ID</label>
    <input readonly class="form-control" readonly type="text" name="id" value="<?php echo e($veiculo->id); ?>">
  </div>
  <div class="mb-3">
    <label for="modelo" class="form-label text-capitalize">Modelo</label>
    <input class="form-control <?php $__errorArgs = ['modelo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="modelo" value="<?php echo e(old('modelo', $veiculo->modelo)); ?>">
  </div>
  <div class="mb-3">
    <label for="marca" class="form-label text-capitalize">Marca</label>
    <input class="form-control <?php $__errorArgs = ['marca'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="marca" value="<?php echo e(old('marca', $veiculo->marca)); ?>">
  </div>
  <div class="mb-3">
    <label for="valor_dia" class="form-label text-capitalize">Valor Dia</label>
    <input class="form-control <?php $__errorArgs = ['valor_dia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="number" name="valor_dia" value="<?php echo e(old('marca', $veiculo->valor_dia)); ?>">
  </div>
  <div class="mb-3">
    <label for="placa" class="form-label text-capitalize">Placa</label>
    <input class="form-control <?php $__errorArgs = ['placa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="placa" value="<?php echo e(old('marca', $veiculo->placa)); ?>">
  </div>

  <div class="mb-3">
    <label for="ano" class="form-label text-capitalize">Ano Fabricação</label>
    <input class="form-control <?php $__errorArgs = ['ano'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="number" name="ano" value="<?php echo e(old('marca', $veiculo->ano)); ?>">
  </div>

  <div class="mb-3">
    <label for="categoria_id" class="form-label">Categoria</label>
    <select class="form-select <?php $__errorArgs = ['categoria_id'];
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
    <label for="arquivo" class="form-label">Figura</label>
    <input class="form-control" type="file" name="arquivo" accept="image/*">
  </div>

  <button class="btn btn-success" type="submit" name="button">Salvar</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\webIII2023.1-Noturno\news\resources\views/frmVeiculo.blade.php ENDPATH**/ ?>