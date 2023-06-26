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

<form class="form-filtro" action="<?php echo e(url('locacao/listar')); ?>" method="post">
  <?php echo csrf_field(); ?>
  <a href="relatorio" class="btn btn-warning btn-add-relatorio mb-3" title="Baixar relatório">
  <i class="fa-solid fa-file-pdf"></i>
    <span>Relatório</span>
  </a>
  <a href="novo" class="btn btn-add-relatorio mb-3 bg-orange text-white" title="Adicionar nova locação">
    <i class="fa-solid fa-plus"></i>
    <span>Adicionar</span>
  </a>
  <input type="search" name="pesquisa" value="<?php echo e($filters); ?>" placeholder="Filtrar por nome, CPF, placa ou modelo">
  <!-- <select name="status">
    <option value="3" <?php echo e($status != 1 && $status != 2 ? "selected": ""); ?>>Mostrar todos</option>
    <option value="1" <?php echo e($status != 2 && $status != 3 ? "selected": ""); ?>>Abertas</option>
    <option value="2" <?php echo e($status != 1 && $status != 3 ? "selected": ""); ?>>Fechadas</option>
  </select> -->
  <button type="submit" class="btn-filtrar">Filtar</button>
</form>
<div class="container-list-veiculos">
  <h2 class="titulo-h2">Listagem de Locações</h2>
  <?php $__currentLoopData = $locacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="card-list-veiculo p-20 items-center <?php if($locacao->status==2): ?> row-success <?php endif; ?> <?php if(floor(strtotime($locacao['data_entrega']) - strtotime(date('Y-m-d')))<0 && $locacao->status==1): ?> row-danger <?php endif; ?>">
    <img src="/storage/imagens/<?php echo e($locacao->cliente->imagem); ?>" alt="" srcset="" class="img-circle">
    <div class="right-list-veiculo">
      <div class="text-list-veiculo">
        <span class="font-bold">
          <a class='w-full text-white' type='button' data-bs-toggle='modal' data-bs-target='#staticBackdropCli<?php echo e($locacao->cliente->id); ?>'>
            <?php echo e($locacao->cliente->nome); ?>

          </a>
          -
          <span class="text-orange font-bold">
            <a class='w-full text-orange' type='button' data-bs-toggle='modal' data-bs-target='#staticBackdropVeiculo<?php echo e($locacao->veiculo->id); ?>'>
              <?php echo e($locacao->veiculo->modelo); ?>

            </a>
          </span>
        </span>
        <span class="text-gray"><?php echo e($locacao->cliente->cpf); ?></span>
        <span class="text-gray">
          <?php echo e($locacao->data_locacao); ?> à <?php echo e($locacao->data_entrega); ?> - <?php echo e($locacao->dias); ?> dia(s) -
          <span class="text-orange font-bold">R$ <?php echo e($locacao->dias * $locacao->veiculo->valor_dia); ?></span>
        </span>
        <span class="text-orange font-bold"><?php echo e($locacao->status == 1 ? 'Aberta' : 'Fechada'); ?><?php echo e(floor(strtotime($locacao['data_entrega']) - strtotime(date('Y-m-d'))) < 0 && $locacao->status==1 ? ' / Atrasada' : ''); ?></span>
      </div>
      <div class="linha-list-veiculo"></div>
      <div class="opcoes-list-veiculo">
        <a class="card-icon-list-veiculo" href='editar/<?php echo e($locacao->id); ?>' title='Alterar <?php echo e($locacao->id); ?>'>
          <i class='fa-sharp fa-solid fa-pen-to-square'></i>
          <span>Alterar</span>
        </a>
        <a class="card-icon-list-veiculo" data-bs-toggle='modal' data-bs-target='#staticBackdrop<?php echo e($locacao->id); ?>' title='Remover <?php echo e($locacao->id); ?>'>
          <i class='fa-sharp fa-solid fa-trash'></i>
          <span>Remover</span>
        </a>
      </div>
    </div>
  </div>

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
          <h5 class='modal-title' id='staticBackdropLabel'>Exclusão de Locação</h5>
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
</div>
<?php echo e($locacoes->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\webIII_atvd_2\resources\views/listagemLocacao.blade.php ENDPATH**/ ?>