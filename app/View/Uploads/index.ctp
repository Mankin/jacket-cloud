<?php
/*
* Load Header
*/
echo $this->element('header', array());
?>

<div class="container wrapper">
    <?php echo $this->Form->create('Work', array(
            'type' => 'file',
            'enctype' => 'multipart/form-data',
        )
    ); ?>
        <?php echo $this->Form->file('file'); ?>
        <?php echo $this->Form->submit('Upload', array(
                'class' => 'btn btn-primary'
            )
        ); ?>
    <?php echo $this->Form->end(); ?>
</div>


<?php
/*
* Load Footer
*/
echo $this->element('footer');
?>
