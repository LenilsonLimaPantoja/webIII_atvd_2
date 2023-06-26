<?php $__env->startSection('conteudo'); ?>
<h1 class="text-center">Cadastro de Cliente</h1>
<hr style="border-bottom: solid; border-width: 1px" class="mb-3">
<?php if($cliente->imagem != ""): ?>
<img style="width: 200px;object-fit:cover" class="rounded" src="/storage/imagens/<?php echo e($cliente->imagem); ?>">
<?php endif; ?>

<form action="<?php echo e(url('cliente/salvar')); ?>" method="post" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <div class="mb-3  <?php if($cliente->id==0): ?> d-none <?php endif; ?>">
    <label for="id" class="form-label">ID</label>
    <input readonly class="form-control" readonly type="text" name="id" value="<?php echo e($cliente->id); ?>">
  </div>
  <div class="mb-3">
    <label for="arquivo" class="form-label">Figura</label>
    <input class="form-control" type="file" <?php echo e($cliente->id == 0 ? 'required': ''); ?> name="arquivo" accept="image/*">
  </div>
  <div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input class="form-control <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="nome" value="<?php echo e($cliente->nome); ?>">
  </div>
  <div class="mb-3">
    <label for="telefone" class="form-label text-capitalize">Telefone</label>
    <input class="form-control <?php $__errorArgs = ['telefone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="tel" name="telefone" value="<?php echo e($cliente->telefone); ?>">
  </div>

  <div class="mb-3">
    <label for="cpf" class="form-label text-capitalize">cpf</label>
    <input class="form-control <?php $__errorArgs = ['cpf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="number" name="cpf" value="<?php echo e($cliente->cpf); ?>">
  </div>

  <div class="mb-3">
    <label for="email" class="form-label text-capitalize">email</label>
    <input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="email" name="email" value="<?php echo e($cliente->email); ?>">
  </div>

  <div class="mb-3">
    <label for="cep" class="form-label text-capitalize">cep</label>
    <input class="form-control <?php $__errorArgs = ['cep'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="cep" id="cep" value="<?php echo e($cliente->cep); ?>">
  </div>

  <div class="mb-3">
    <label for="logradouro" class="form-label text-capitalize">logradouro</label>
    <input class="form-control <?php $__errorArgs = ['logradouro'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="logradouro" id="logradouro" value="<?php echo e($cliente->logradouro); ?>">
  </div>

  <div class="mb-3">
    <label for="bairro" class="form-label text-capitalize">bairro</label>
    <input class="form-control <?php $__errorArgs = ['bairro'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="bairro" id="bairro" value="<?php echo e($cliente->bairro); ?>">
  </div>

  <div class="mb-3">
    <label for="cidade" class="form-label text-capitalize">cidade</label>
    <input class="form-control <?php $__errorArgs = ['cidade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="cidade" id="cidade" value="<?php echo e($cliente->cidade); ?>">
  </div>

  <div class="mb-3">
    <label for="uf" class="form-label text-capitalize">uf</label>
    <input class="form-control <?php $__errorArgs = ['uf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="uf" id="uf" value="<?php echo e($cliente->uf); ?>">
  </div>

  <div class="mb-3">
    <label for="numero" class="form-label text-capitalize">número</label>
    <input class="form-control <?php $__errorArgs = ['numero'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="number" name="numero" id="numero" value="<?php echo e($cliente->numero); ?>">
  </div>
  <button class="btn btn-primary" type="submit" name="button">Salvar</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\webIII2023.1-Noturno\news\resources\views/frmCliente.blade.php ENDPATH**/ ?>