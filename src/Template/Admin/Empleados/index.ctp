<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Empleados

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-sm']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('List'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="table table-hover table-bordered table-striped">
            <thead>
              <tr>
                  <th scope="col" class="text-center"><?= __('id') ?></th>
                  <th scope="col" class="text-center"><?= __('area_id') ?></th>
                  <th scope="col" class="text-center"><?= __('cargo_id') ?></th>
                  <th scope="col" class="text-center"><?= __('empleado') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($empleados as $empleado): ?>
                <tr>
                  <td><?= $this->Number->format($empleado->id) ?></td>
                  <td><?= $empleado->has('area') ? $this->Html->link($empleado->area->area, ['controller' => 'Areas', 'action' => 'view', $empleado->area->id]) : '' ?></td>
                  <td><?= $empleado->has('cargo') ? $this->Html->link($empleado->cargo->cargo, ['controller' => 'Cargos', 'action' => 'view', $empleado->cargo->id]) : '' ?></td>
                  <td><?= h($empleado->empleado) ?></td>
                  <td class="actions text-center">
                      <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-eye']), ['action' => 'view', $empleado->id], ['class'=>'btn btn-info btn-xs', 'title' => __('View'), 'escape' => false]) ?>
                      <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-pencil']), ['action' => 'edit', $empleado->id], ['class'=>'btn btn-warning btn-xs', 'title' => __('Edit'), 'escape' => false]) ?>
                      <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-remove']), ['action' => 'remove', $empleado->id], ['confirm' => __('Are you sure you want to remove # {0}?', $empleado->id), 'class'=>'btn btn-danger btn-xs', 'title' => __('Remove'), 'escape' => false]) ?>
                      <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash-o']), ['action' => 'delete', $empleado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empleado->id), 'class'=>'btn bg-black btn-xs', 'title' => __('Delete'), 'escape' => false]) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>

<!-- DataTables -->
<?php echo $this->Html->css('AdminLTE./bower_components/datatables.net-bs/css/dataTables.bootstrap.min', ['block' => 'css']); ?>

<!-- DataTables -->
<?php echo $this->Html->script('AdminLTE./bower_components/datatables.net/js/jquery.dataTables.min', ['block' => 'script']); ?>
<?php echo $this->Html->script('AdminLTE./bower_components/datatables.net-bs/js/dataTables.bootstrap.min', ['block' => 'script']); ?>

<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    $('#tabla').DataTable({
      'language': {
        'url': "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
      },
      'pageLength': 25,
      'info': true
    })
  })
</script>
<?php $this->end(); ?>
