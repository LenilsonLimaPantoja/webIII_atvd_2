<?php $__env->startSection('conteudo'); ?>
<h1 class="text-center">Listagem de Clientes</h1>
<hr style="border-bottom: solid; border-width: 1px" class="mb-3">
<a href="novo" class="btn btn-success mb-3">Novo</a>
<div class="table-responsive">
  <table class="table table-bordered table-striped">
    <thead>
      <tr class="bg-dark">
        <!-- <th class="text-center text-uppercase text-light">ID</th> -->
        <th class="text-center text-uppercase text-light">Imagem</th>
        <th class="text-center text-uppercase text-light">Nome</th>
        <th class="text-center text-uppercase text-light">Cpf</th>
        <th class="text-center text-uppercase text-light">telefone</th>
        <th class="text-center text-uppercase text-light">cidade</th>
        <th class="text-center text-uppercase text-light">UF</th>
        <th class="text-center text-uppercase text-light">###</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <!-- <td class='text-center'><?php echo e($cliente->id); ?></td> -->
        <td class='text-center'>
          <?php if($cliente->imagem != ""): ?>
          <img style="width: 50px;" class="rounded-circle" src="/storage/imagens/<?php echo e($cliente->imagem); ?>">
          <?php endif; ?>
        </td>
        <td class='text-center'><?php echo e($cliente->nome); ?></td>
        <td class='text-center'><?php echo e($cliente->cpf); ?></td>
        <td class='text-center'><?php echo e($cliente->telefone); ?></td>
        <td class='text-center'><?php echo e($cliente->cidade); ?></td>
        <td class='text-center'><?php echo e($cliente->uf); ?></td>

        <td class='text-center'>
          <a class='btn btn-primary' href='editar/<?php echo e($cliente->id); ?>' title='Alterar <?php echo e($cliente->id); ?>'>
            <i class='fa-sharp fa-solid fa-pen-to-square'></i>
          </a>
          <a class='btn btn-danger' type='button' data-bs-toggle='modal' data-bs-target='#staticBackdrop<?php echo e($cliente->id); ?>' title='Remover <?php echo e($cliente->id); ?>'>
            <i class='fa-sharp fa-solid fa-trash'></i>
          </a>
        </td>
      </tr>
      </tr>

      <div class='modal fade' id='staticBackdrop<?php echo e($cliente->id); ?>' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='staticBackdropLabel'>Exclusão de Cliente</h5>
              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body text-center'>
              Desejea realmente excluir o cliente <span style='font-weight: bold;'><?php echo e($cliente->nome); ?></span>? Todas as locações vinculadas a esse cliente tambem serão removidas!
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Cancelar</button>
              <a class='btn btn-danger' href='excluir/<?php echo e($cliente->id); ?>'>Confirmar</a>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
  </table>
</div>
<?php echo e($clientes->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\webIII2023.1-Noturno\locadora\resources\views/listagemCliente.blade.php ENDPATH**/ ?>