

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
<form class="form-filtro" action="<?php echo e(url('veiculo/listar')); ?>" method="post">
  <?php echo csrf_field(); ?>
  <a href="novo" class="btn btn-add-relatorio mb-3 bg-orange text-white" title="Adicionar novo veículo">
    <i class="fa-solid fa-plus"></i>
    <span>Adicionar</span>
  </a>
  <input type="search" name="pesquisa" value="<?php echo e($filters); ?>" placeholder="Filtrar por modelo, placa ou categoria">
  <!-- <select name="status">
    <option value="2" <?php echo e($status != 1 && $status != 0 ? "selected": ""); ?>>Mostrar todos</option>
    <option value="0" <?php echo e($status != 1 && $status != 2 ? "selected": ""); ?>>Disponivel</option>
    <option value="1" <?php echo e($status != 0 && $status != 2 ? "selected": ""); ?>>Não disponivel</option>
  </select> -->
  <button type="submit" class="btn-filtrar">Filtar</button>
</form>
<div class="container-list-veiculos">
  <h2 class="titulo-h2">Listagem de Veículos</h2>
  <?php $__currentLoopData = $veiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $veiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="card-list-veiculo <?php if($veiculo->status==1): ?> row-danger <?php endif; ?>">
    <img src="/storage/imagens/<?php echo e($veiculo->imagem); ?>" alt="" srcset="" width="200">
    <div class="right-list-veiculo">
      <div class="text-list-veiculo">
        <span class="font-bold"><?php echo e($veiculo->modelo); ?> -
          <span class="text-orange font-bold">R$ <?php echo e($veiculo->valor_dia); ?> / dia</span>
        </span>
        <span class="text-gray"><?php echo e($veiculo->ano); ?> - <?php echo e($veiculo->categoria->descricao); ?> - <?php echo e($veiculo->placa); ?></span>
        <span class="<?php if($veiculo->status==0): ?> text-gray <?php endif; ?> <?php if($veiculo->status==1): ?> text-orange <?php endif; ?>"><?php echo e($veiculo->status == 1 ? 'Não disponivel' : 'Disponivel'); ?></span>
      </div>
      <div class="linha-list-veiculo"></div>
      <div class="opcoes-list-veiculo">
        <a class="card-icon-list-veiculo" href='editar/<?php echo e($veiculo->id); ?>' title='Alterar <?php echo e($veiculo->id); ?>'>
          <i class='fa-sharp fa-solid fa-pen-to-square'></i>
          <span>Alterar</span>
        </a>
        <a class="card-icon-list-veiculo" data-bs-toggle='modal' data-bs-target='#staticBackdrop<?php echo e($veiculo->id); ?>' title='Remover <?php echo e($veiculo->id); ?>'>
          <i class='fa-sharp fa-solid fa-trash'></i>
          <span>Remover</span>
        </a>
      </div>
    </div>
  </div>

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
</div>
<?php echo e($veiculos->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\locadora\resources\views/listagemVeiculos.blade.php ENDPATH**/ ?>