<section class="content-header">
  <h1>
    User
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
            <dt scope="row"><?= __('Name') ?></dt>
            <dd><?= h($user->name) ?></dd>
            <dt scope="row"><?= __('Email') ?></dt>
            <dd><?= h($user->email) ?></dd>
            <dt scope="row"><?= __('Password') ?></dt>
            <dd><?= h($user->password) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($user->id) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($user->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($user->modified) ?></dd>
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
          <h3 class="box-title"><?= __('Posts') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($user->posts)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Title') ?></th>
                    <th scope="col"><?= __('Body') ?></th>
                    <th scope="col"><?= __('User Id') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($user->posts as $posts): ?>
              <tr>
                    <td><?= h($posts->id) ?></td>
                    <td><?= h($posts->title) ?></td>
                    <td><?= h($posts->body) ?></td>
                    <td><?= h($posts->user_id) ?></td>
                    <td><?= h($posts->created) ?></td>
                    <td><?= h($posts->modified) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
