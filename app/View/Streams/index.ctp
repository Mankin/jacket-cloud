<?php echo $this->Session->flash(); ?>
<div class="row thumbs">
<?php foreach ($worksList as $work): ?>
    <div class="col-xs-6 col-md-3">
        <a href="<?php echo $this->Html->url('/img/works/' . $work['Work']['name']); ?>" class="thumbnail"><?php echo $this->Html->image('works/' . $work['Work']['name']); ?></a>
    </div>
<?php endforeach; ?>
</div>

