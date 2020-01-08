<section class="content-header">
  <h1>
    Cargo
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
            <dt scope="row"><?= __('Cargo') ?></dt>
            <dd><?= h($cargo->cargo) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($cargo->id) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($cargo->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($cargo->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Empleados') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <?php if (!empty($cargo->empleados)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Area Id') ?></th>
                    <th scope="col"><?= __('Cargo Id') ?></th>
                    <th scope="col"><?= __('Empleado') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($cargo->empleados as $empleados): ?>
              <tr>
                    <td><?= h($empleados->id) ?></td>
                    <td><?= h($empleados->area_id) ?></td>
                    <td><?= h($empleados->cargo_id) ?></td>
                    <td><?= h($empleados->empleado) ?></td>
                      <td class="actions text-center">
                      <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-eye']), ['controller' => 'Empleados', 'action' => 'view', $empleados->id], ['class'=>'btn btn-info btn-xs', 'title' => __('View'), 'escape' => false]) ?>
                      <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-pencil']), ['controller' => 'Empleados', 'action' => 'edit', $empleados->id], ['class'=>'btn btn-warning btn-xs', 'title' => __('Edit'), 'escape' => false]) ?>
                      <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-remove']), ['controller' => 'Empleados', 'action' => 'remove', $empleados->id], ['confirm' => __('Are you sure you want to remove # {0}?', $empleados->id), 'class'=>'btn btn-danger btn-xs', 'title' => __('Remove'), 'escape' => false]) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
