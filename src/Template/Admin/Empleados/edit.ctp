<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Empleado $empleado
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Empleado
      <small><?php echo __('Edit'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Form'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($empleado, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('area_id', ['options' => $areas, 'empty' => 'Selecciona un opción', 'class' => 'form-control select2', 'style' => 'width: 100%']);
                echo $this->Form->control('cargo_id', ['options' => $cargos, 'empty' => 'Selecciona un opción', 'class' => 'form-control select2', 'style' => 'width: 100%']);
                echo $this->Form->control('empleado');
              ?>
            </div>
            <!-- /.box-body -->

          <?php echo $this->Form->submit(__('Submit')); ?>

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>

<!-- Select2 -->
<?php echo $this->Html->css('AdminLTE./bower_components/select2/dist/css/select2.min', ['block' => 'css']); ?>

<!-- Select2 -->
<?php echo $this->Html->script('AdminLTE./bower_components/select2/dist/js/select2.full.min', ['block' => 'script']); ?>

<?php $this->start('scriptBottom'); ?>
<script>
  $(document).ready(function() {
    $('.select2').select2();
});
</script>
<?php $this->end(); ?>
