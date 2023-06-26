<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name=viewport content="width=device-width, initial-scale=1">
  <title></title>
  <style>
    * {
      font-family: arial, sans-serif;
    }

    h1 {
      text-align: center;
    }

    table {
      width: 100%;
      margin: 0 auto;
      border-collapse: collapse;
    }

    th,
    td {
      border: solid 1px gray;
      padding: 0.5rem;
      text-align: center;
    }
    .img-pdf{
      width: 60px;
      border-radius: 5px;
    }
  </style>
</head>

<body>
  <h1>Relatório de Locações</h1>
  <table>
    <thead>
      <tr>
        <th>Cliente</th>
        <th>CPF</th>
        <th>Veículo</th>
        <th>Locação</th>
        <th>Entrega</th>
        <th>Dias</th>
        <th>Total</th>
        <th>Status</th>
        <th>IMG</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $locacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($locacao->cliente->nome); ?></td>
        <td><?php echo e($locacao->cliente->cpf); ?></td>
        <td><?php echo e($locacao->veiculo->modelo); ?></td>
        <td><?php echo e($locacao->data_locacao); ?></td>
        <td><?php echo e($locacao->data_entrega); ?></td>
        <td><?php echo e($locacao->dias); ?></td>
        <td>R$ <?php echo e($locacao->dias * $locacao->veiculo->valor_dia); ?></td>
        <td><?php echo e($locacao->status == 1 ? 'aberta' : 'fechada'); ?></td>
        <td>
          <img class="img-pdf" src="<?php echo e(public_path()); ?>/storage/imagens/<?php echo e($locacao->veiculo->imagem); ?>" alt="" srcset="">
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</body>

</html><?php /**PATH C:\Users\Lenilson Lima\Desktop\locadora\resources\views/relatorioLocacao.blade.php ENDPATH**/ ?>