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
        font-size: 3rem;
        text-align: center;
      }
      table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
      }
      th, td {
        border: solid 1px gray;
        padding: 0.5rem;
        font-size: 1.5rem;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <h1>Relatório de Categoria</h1>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Descrição</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($categoria->id); ?></td>
            <td><?php echo e($categoria->descricao); ?></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </body>
</html>
<?php /**PATH C:\Users\Lenilson Lima\Desktop\locadora\resources\views/relatorioCategoria.blade.php ENDPATH**/ ?>