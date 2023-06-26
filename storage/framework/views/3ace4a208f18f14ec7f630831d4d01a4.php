

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
<form class="form-filtro" action="<?php echo e(url('categoria/listar')); ?>" method="post">
  <?php echo csrf_field(); ?>
  <a href="novo" class="btn btn-add-relatorio mb-3 bg-orange text-white" title="Adicionar nova categoria">
    <i class="fa-solid fa-plus"></i>
    <span>Adicionar</span>
  </a>
  <input type="text" name="pesquisa" value="<?php echo e($filters); ?>" placeholder="Filtrar pela descrição">
  <button type="submit" class="btn-filtrar">Filtar</button>
</form>
<div class="container-list-veiculos">
  <h2 class="titulo-h2">Listagem de Categorias</h2>
  <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="card-list-veiculo p-20 items-center">
    <img src="https://cdn-icons-png.flaticon.com/512/1646/1646740.png" alt="" srcset="" class="img-circle">
    <div class="right-list-veiculo">
      <div class="text-list-veiculo">
        <span class="text-orange font-bold">
          <span class="text-gray"><?php echo e($categoria->id); ?></span> -
          <?php echo e($categoria->descricao); ?></span>
      </div>
      <div class="linha-list-veiculo"></div>
      <div class="opcoes-list-veiculo">
        <a class="card-icon-list-veiculo" href='editar/<?php echo e($categoria->id); ?>' title='Alterar <?php echo e($categoria->id); ?>'>
          <i class='fa-sharp fa-solid fa-pen-to-square'></i>
          <span>Alterar</span>
        </a>
        <a class="card-icon-list-veiculo" data-bs-toggle='modal' data-bs-target='#staticBackdrop<?php echo e($categoria->id); ?>' title='Remover <?php echo e($categoria->id); ?>'>
          <i class='fa-sharp fa-solid fa-trash'></i>
          <span>Remover</span>
        </a>
      </div>
    </div>
  </div>

  <div class='modal fade' id='staticBackdrop<?php echo e($categoria->id); ?>' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='staticBackdropLabel'>Exclusão de Categoria</h5>
          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body text-center'>
          Desejea realmente excluir a categoria <span style='font-weight: bold;'><?php echo e($categoria->descricao); ?></span>? Todos os veículos vinculados a essa categoria tambem serão removidos!
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Cancelar</button>
          <a class='btn btn-danger' href='excluir/<?php echo e($categoria->id); ?>'>Confirmar</a>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php echo e($categorias->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\locadora\resources\views/listagemCategoria.blade.php ENDPATH**/ ?>