<section class="content-header">
  <h1>
    Area
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
          <?php foreach ($areas['area'] as $area): ?>
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Area') ?></dt>
            <dd><?= h($area->area) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($area->id) ?></dd>
            <dt scope="row"><?= __('Area Id') ?></dt>
            <dd><?= $area->has('r') ? $this->Html->link($area->r['area'], ['controller' => 'Areas', 'action' => 'view', $area->area_id]) : '' ?></dd>
            <dt scope="row"><?= __('Deleted') ?></dt>
            <dd><?= $this->Number->format($area->deleted) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($area->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($area->modified) ?></dd>
          </dl>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Subáreas') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <?php if (sizeof($areas['subareas']) > 0): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <!-- <th scope="col"><?= __('Area Id') ?></th> -->
                    <th scope="col"><?= __('Area') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col"><?= __('Deleted') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($areas['subareas'] as $subareas): ?>
              <tr>
                    <td><?= h($subareas->id) ?></td>
                    <!-- <td><?= h($subareas->area_id) ?></td> -->
                    <td><?= h($subareas->area) ?></td>
                    <td><?= h($subareas->created) ?></td>
                    <td><?= h($subareas->modified) ?></td>
                    <td><?= h($subareas->deleted) ?></td>
                      <td class="actions text-center">
                      <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-eye']), ['controller' => 'Areas', 'action' => 'view', $subareas->id], ['class'=>'btn btn-info btn-xs', 'title' => __('View'), 'escape' => false]) ?>
                      <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-pencil']), ['controller' => 'Areas', 'action' => 'edit', $subareas->id], ['class'=>'btn btn-warning btn-xs', 'title' => __('Edit'), 'escape' => false]) ?>
                      <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-remove']), ['controller' => 'Areas', 'action' => 'remove', $subareas->id], ['confirm' => __('Are you sure you want to remove # {0}?', $subareas->id), 'class'=>'btn btn-danger btn-xs', 'title' => __('Remove'), 'escape' => false]) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
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
          <?php if (sizeof($areas['empleados']) > 0): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <!-- <th scope="col"><?= __('Area Id') ?></th> -->
                    <th scope="col"><?= __('Empleado') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col"><?= __('Deleted') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($areas['empleados'] as $empleados): ?>
              <tr>
                    <td><?= h($empleados->id) ?></td>
                    <!-- <td><?= h($empleados->area_id) ?></td> -->
                    <td><?= h($empleados->empleado) ?></td>
                    <td><?= h($empleados->created) ?></td>
                    <td><?= h($empleados->modified) ?></td>
                    <td><?= h($empleados->deleted) ?></td>
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
