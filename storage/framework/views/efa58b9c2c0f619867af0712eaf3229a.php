<?php $__env->startSection('conteudo'); ?>
<form class="form-filtro" action="<?php echo e(url('cliente/listar')); ?>" method="post">
  <?php echo csrf_field(); ?>
  <a href="novo" class="btn btn-add-relatorio mb-3 bg-orange text-white" title="Adicionar novo cliente">
    <i class="fa-solid fa-plus"></i>
    <span>Adicionar</span>
  </a>
  <input type="search" name="pesquisa" value="<?php echo e($filters); ?>" placeholder="Filtrar por nome, email ou CPF">
  <button type="submit" class="btn-filtrar">Filtar</button>
</form>
<div class="container-list-veiculos">
  <h2 class="titulo-h2">Listagem de Clientes</h2>
  <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="card-list-veiculo p-20 items-center">
    <img src="/storage/imagens/<?php echo e($cliente->imagem); ?>" alt="" srcset="" class="img-circle">
    <div class="right-list-veiculo">
      <div class="text-list-veiculo">
        <span class="font-bold"><?php echo e($cliente->nome); ?> -
          <span class="text-orange font-bold"><?php echo e($cliente->cpf); ?></span>
        </span>
        <span class="text-gray"><?php echo e($cliente->telefone); ?> - <?php echo e($cliente->email); ?></span>
        <span class="text-gray"><?php echo e($cliente->cidade); ?> - <?php echo e($cliente->uf); ?></span>
      </div>
      <div class="linha-list-veiculo"></div>
      <div class="opcoes-list-veiculo">
        <a class="card-icon-list-veiculo" href='editar/<?php echo e($cliente->id); ?>' title='Alterar <?php echo e($cliente->id); ?>'>
          <i class='fa-sharp fa-solid fa-pen-to-square'></i>
          <span>Alterar</span>
        </a>
        <a class="card-icon-list-veiculo" data-bs-toggle='modal' data-bs-target='#staticBackdrop<?php echo e($cliente->id); ?>' title='Remover <?php echo e($cliente->id); ?>'>
          <i class='fa-sharp fa-solid fa-trash'></i>
          <span>Remover</span>
        </a>
      </div>
    </div>
  </div>

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
</div>
<?php echo e($clientes->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\locadora\resources\views/listagemCliente.blade.php ENDPATH**/ ?>