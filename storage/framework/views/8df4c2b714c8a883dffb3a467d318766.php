
<?php $__env->startSection('conteudo'); ?>
<form action="<?php echo e(url('locacao/novo')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <input type="text" name="fromName" placeholder="nome">
    <input type="text" name="fromEmail" placeholder="email">
    <input type="text" name="subject" placeholder="assunto">
    <input type="text" name="message" placeholder="mensagem">
    <button>ssss</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenilson Lima\Desktop\locadora\resources\views/contact.blade.php ENDPATH**/ ?>