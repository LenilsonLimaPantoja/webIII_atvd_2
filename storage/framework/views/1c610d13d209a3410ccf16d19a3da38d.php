

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
        <th class="text-center text-uppercase text-light">Veiculo</th>
        <th class="text-center text-uppercase text-light">Cliente</th>
        <th class="text-center text-uppercase text-light">CPF</th>
        <th class="text-center text-uppercase text-light">Status</th>
        <th class="text-center text-uppercase text-light">Saída</th>
        <th class="text-center text-uppercase text-light">Entrega</th>
        <th class="text-center text-uppercase text-light">Dias</th>
        <th class="text-center text-uppercase text-light">Total</th>
        <th class="text-center text-uppercase text-light">####</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $locacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr class="<?php if($locacao->status==2): ?> table-success <?php endif; ?> <?php if(floor(strtotime($locacao['data_entrega']) - strtotime(date('Y-m-d')))<0 && $locacao->status==1): ?> table-danger <?php endif; ?>">
        <!-- <td class='text-center'><?php echo e($locacao->id); ?></td> -->
        <td class='text-center'>
          <a class='w-full' type='button' data-bs-toggle='modal' data-bs-target='#staticBackdropVeiculo<?php echo e($locacao->veiculo->id); ?>'>
            <?php echo e($locacao->veiculo->modelo); ?>

          </a>
        </td>

        <td class='text-center'>
          <a class='w-full' type='button' data-bs-toggle='modal' data-bs-target='#staticBackdropCli<?php echo e($locacao->cliente->id); ?>'>
            <?php echo e($locacao->cliente->nome); ?>

          </a>
        </td>
        <td class='text-center'><?php echo e($locacao->cliente->cpf); ?></td>
        <td class='text-center'><?php echo e($locacao->status == 1 ? 'aberta' : 'fechada'); ?></td>
        <td class='text-center'><?php echo e($locacao->data_locacao); ?></td>
        <td class='text-center'><?php echo e($locacao->data_entrega); ?></td>
        <td class='text-center'><?php echo e($locacao->dias); ?></td>
        <td class='text-center'><?php echo e($locacao->dias * $locacao->veiculo->valor_dia); ?></td>
        <td class='text-center'>
          <a class='btn btn-primary' href='editar/<?php echo e($locacao->id); ?>' title='Alterar <?php echo e($locacao->id); ?>'>
            <i class='fa-sharp fa-solid fa-pen-to-square'></i>
          </a>
          <a class='btn btn-danger' type='button' data-bs-toggle='modal' data-bs-target='#staticBackdrop<?php echo e($locacao->id); ?>' title='Remover <?php echo e($locacao->id); ?>'>
            <i class='fa-sharp fa-solid fa-trash'></i>
          </a>
        </td>
      </tr>

      <div class='modal fade' id='staticBackdropCli<?php echo e($locacao->cliente->id); ?>' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='staticBackdropLabel'>Dados do cliente</h5>
              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body text-center'>
              <div class="w-full d-flex justify-content-center">
                <?php if($locacao->cliente->imagem != ""): ?>
                <img src="/storage/imagens/<?php echo e($locacao->cliente->imagem); ?>" class="rounded-circle p-1" style="width: 200px;" alt="...">
                <?php endif; ?>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">ID: <?php echo e($locacao->cliente->id); ?></li>
                  <li class="list-group-item">NOME: <?php echo e($locacao->cliente->nome); ?></li>
                  <li class="list-group-item">CPF: <?php echo e($locacao->cliente->cpf); ?></li>
                  <li class="list-group-item">CIDADE: <?php echo e($locacao->cliente->cidade); ?></li>
                  <li class="list-group-item">UF: <?php echo e($locacao->cliente->uf); ?></li>
                </ul>
              </div>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Fechar</button>
            </div>
          </div>
        </div>
      </div>

      <div class='modal fade' id='staticBackdropVeiculo<?php echo e($locacao->veiculo->id); ?>' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='staticBackdropLabel'>Dados do veiculo</h5>
              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body text-center d-flex justify-content-center'>
              <div class="card w-full">
                <?php if($locacao->veiculo->imagem != ""): ?>
                <img src="/storage/imagens/<?php echo e($locacao->veiculo->imagem); ?>" class="card-img-top" alt="...">
                <?php endif; ?>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">ID: <?php echo e($locacao->veiculo->id); ?></li>
                  <li class="list-group-item">MODELO: <?php echo e($locacao->veiculo->modelo); ?></li>
                  <li class="list-group-item">PLACA: <?php echo e($locacao->veiculo->placa); ?></li>
                  <li class="list-group-item">VALOR DIA: <?php echo e($locacao->veiculo->valor_dia); ?></li>
                </ul>
              </div>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Fechar</button>
            </div>
          </div>
        </div>
      </div>

      <div class='modal fade' id='staticBackdrop<?php echo e($locacao->id); ?>' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='staticBackdropLabel'>Exclusão de Veículo</h5>
              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body text-center'>
              Desejea realmente excluir o locação <span style='font-weight: bold;'><?php echo e($locacao->id); ?></span>?
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Cancelar</button>
              <a class='btn btn-danger' href='excluir/<?php echo e($locacao->id); ?>'>Confirmar</a>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
  </table>
</div>
<?php echo e($locacoes->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\webIII2023.1-Noturno\locadora\resources\views/listagemLocacao.blade.php ENDPATH**/ ?>