<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Images

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
                  <th scope="col" class="text-center"><?= __('post_id') ?></th>
                  <th scope="col" class="text-center"><?= __('created') ?></th>
                  <th scope="col" class="text-center"><?= __('modified') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($images as $image): ?>
                <tr>
                  <td><?= $this->Number->format($image->id) ?></td>
                  <td><?= $image->has('post') ? $this->Html->link($image->post->title, ['controller' => 'Posts', 'action' => 'view', $image->post->id]) : '' ?></td>
                  <td><?= h($image->created) ?></td>
                  <td><?= h($image->modified) ?></td>
                  <td class="actions text-center">
                      <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-eye']), ['action' => 'view', $image->id], ['class'=>'btn btn-info btn-xs', 'title' => __('View'), 'escape' => false]) ?>
                      <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-pencil']), ['action' => 'edit', $image->id], ['class'=>'btn btn-warning btn-xs', 'title' => __('Edit'), 'escape' => false]) ?>
                      <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash']), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id), 'class'=>'btn btn-danger btn-xs', 'title' => __('Delete'), 'escape' => false]) ?>
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