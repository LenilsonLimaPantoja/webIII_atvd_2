<?php $__env->startSection('conteudo'); ?>
<div class="container-index">
    <div class="area-index" style="min-width: 50%;">
        <h1 class="text-white mb-3" style="font-size: 30px; text-transform: capitalize;">Olá <?php echo e($user->name); ?></h1>
        <p class="text-gray">Bem-vindo ao nosso painel de gerenciamento de locação! Aqui você terá acesso a informações detalhadas sobre as locações em andamento, poderá monitorar o status de cada processo, atualizar dados dos clientes e veículos, além de realizar outras ações importantes para o bom funcionamento do sistema de locação.!</p>
    </div>
    <img src="https://finder.createx.studio/img/car-finder/home/hero-img.png" width="50" alt="" srcset="">
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\locadora\resources\views/index.blade.php ENDPATH**/ ?>