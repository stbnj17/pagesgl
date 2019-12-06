<section class="content-header">
  <h1>
    Image
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
            <dt scope="row"><?= __('Post') ?></dt>
            <dd><?= $image->has('post') ? $this->Html->link($image->post->title, ['controller' => 'Posts', 'action' => 'view', $image->post->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($image->id) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($image->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($image->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
