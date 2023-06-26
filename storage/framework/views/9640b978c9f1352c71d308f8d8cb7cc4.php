

<?php $__env->startSection('conteudo'); ?>
<?php if($errors->any()): ?>
<div class="alert alert-danger">
  <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endif; ?>

<h1 class="text-center">Listagem de Veículos</h1>
<hr style="border-bottom: solid; border-width: 1px" class="mb-3">
<a class='btn btn-success mb-3' href="novo">Adicionar</a>
<div class="table-responsive">
  <table class='table table-bordered table-striped table-hover' style="min-width: 1000px;">
    <thead>
      <tr class="bg-dark">
        <!-- <th class="text-center text-uppercase text-light">ID</th> -->
        <th class="text-center text-uppercase text-light">Imagem</th>
        <th class="text-center text-uppercase text-light">Placa</th>
        <th class="text-center text-uppercase text-light">Marca</th>
        <th class="text-center text-uppercase text-light">Modelo</th>
        <th class="text-center text-uppercase text-light">Categoria</th>
        <th class="text-center text-uppercase text-light">Ano</th>
        <th class="text-center text-uppercase text-light">Disponivel</th>
        <th class="text-center text-uppercase text-light">Valor/Dia</th>
        <th class="text-center text-uppercase text-light">####</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $veiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $veiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr class="<?php if($veiculo->status==1): ?> table-danger <?php endif; ?>">
        <!-- <td class='text-center'><?php echo e($veiculo->id); ?></td> -->
        <td class='text-center'>
          <?php if($veiculo->imagem != ""): ?>
          <img style="width: 80px;" class="rounded" src="/storage/imagens/<?php echo e($veiculo->imagem); ?>">
          <?php endif; ?>
        </td>
        <td class='text-center'><?php echo e($veiculo->placa); ?></td>
        <td class='text-center'><?php echo e($veiculo->marca); ?></td>
        <td class='text-center'><?php echo e($veiculo->modelo); ?></td>
        <td class='text-center'><?php echo e($veiculo->categoria->descricao); ?></td>
        <td class='text-center'><?php echo e($veiculo->ano); ?></td>
        <td class='text-center'><?php echo e($veiculo->status == 0 ? 'Sim' : 'Não'); ?></td>
        <td class='text-center'>R$ <?php echo e($veiculo->valor_dia); ?></td>
        <td class='text-center'>
          <a class='btn btn-primary' href='editar/<?php echo e($veiculo->id); ?>' title='Alterar <?php echo e($veiculo->id); ?>'>
            <i class='fa-sharp fa-solid fa-pen-to-square'></i>
          </a>
          <a class='btn btn-danger' type='button' data-bs-toggle='modal' data-bs-target='#staticBackdrop<?php echo e($veiculo->id); ?>' title='Remover <?php echo e($veiculo->id); ?>'>
            <i class='fa-sharp fa-solid fa-trash'></i>
          </a>
        </td>
      </tr>

      <div class='modal fade' id='staticBackdrop<?php echo e($veiculo->id); ?>' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='staticBackdropLabel'>Exclusão de Veículo</h5>
              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body text-center'>
              Desejea realmente excluir o veículo <span style='font-weight: bold;'><?php echo e($veiculo->modelo); ?></span>? Todas as locações vinculadas a esse veículo tambem serão removidas!
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Cancelar</button>
              <a class='btn btn-danger' href='excluir/<?php echo e($veiculo->id); ?>'>Confirmar</a>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
  </table>
</div>
<?php echo e($veiculos->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\webIII2023.1-Noturno\news\resources\views/listagemVeiculos.blade.php ENDPATH**/ ?>