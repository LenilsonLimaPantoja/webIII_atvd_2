

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


<h1 class="text-center">Listagem de Categorias</h1>
<hr style="border-bottom: solid; border-width: 1px" class="mb-3">
<a href="novo" class="btn btn-success mb-3">Novo</a>
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover" style="min-width: 800px;">
    <tr class="bg-dark">
      <!-- <th class="text-center text-uppercase text-light">ID</th> -->
      <th class="text-center text-uppercase text-light">Descrição</th>
      <th class="text-center text-uppercase text-light">####</th>
    </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <!-- <td class='text-center'><?php echo e($categoria->id); ?></td> -->
        <td class='text-center'><?php echo e($categoria->descricao); ?></td>

        <td class='text-center'>
          <a class='btn btn-primary' href='editar/<?php echo e($categoria->id); ?>' title='Alterar /<?php echo e($categoria->id); ?>'>
            <i class='fa-sharp fa-solid fa-pen-to-square'></i>
          </a>
          <a class='btn btn-danger' type='button' data-bs-toggle='modal' data-bs-target='#staticBackdrop<?php echo e($categoria->id); ?>' title='Remover /<?php echo e($categoria->id); ?>'>
            <i class='fa-sharp fa-solid fa-trash'></i>
          </a>
        </td>
      </tr>

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

    </tbody>
  </table>
</div>
<?php echo e($categorias->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\webIII2023.1-Noturno\news\resources\views/listagemCategoria.blade.php ENDPATH**/ ?>