<section class="content-header">
  <h1>
    Empleado
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Area') ?></dt>
            <dd><?= $empleado->has('area') ? $this->Html->link($empleado->area->area, ['controller' => 'Areas', 'action' => 'view', $empleado->area->id]) : '' ?></dd>
            <dt scope="row"><?= __('Cargo') ?></dt>
            <dd><?= $empleado->has('cargo') ? $this->Html->link($empleado->cargo->cargo, ['controller' => 'Cargos', 'action' => 'view', $empleado->cargo->id]) : '' ?></dd>
            <dt scope="row"><?= __('Empleado') ?></dt>
            <dd><?= h($empleado->empleado) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($empleado->id) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($empleado->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($empleado->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
