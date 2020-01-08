<section class="content-header">
  <h1>
    Post
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
            <dt scope="row"><?= __('Title') ?></dt>
            <dd><?= h($post->title) ?></dd>
            <dt scope="row"><?= __('Body') ?></dt>
            <dd><?= h($post->body) ?></dd>
            <dt scope="row"><?= __('User') ?></dt>
            <dd><?= $post->has('user') ? $this->Html->link($post->user->name, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($post->id) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($post->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($post->modified) ?></dd>
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
          <h3 class="box-title"><?= __('Images') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <?php if (!empty($post->images)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Post Id') ?></th>
                    <th scope="col"><?= __('Image') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($post->images as $images): ?>
              <tr>
                    <td><?= h($images->id) ?></td>
                    <td><?= h($images->post_id) ?></td>
                    <td><?= h(stream_get_contents($images->image)) ?></td>
                      <td class="actions text-center">
                      <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-eye']), ['controller' => 'Images', 'action' => 'view', $images->id], ['class'=>'btn btn-info btn-xs', 'title' => __('View'), 'escape' => false]) ?>
                      <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-pencil']), ['controller' => 'Images', 'action' => 'edit', $images->id], ['class'=>'btn btn-warning btn-xs', 'title' => __('Edit'), 'escape' => false]) ?>
                      <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-remove']), ['controller' => 'Images', 'action' => 'remove', $images->id], ['confirm' => __('Are you sure you want to remove # {0}?', $images->id), 'class'=>'btn btn-danger btn-xs', 'title' => __('Remove'), 'escape' => false]) ?>
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
