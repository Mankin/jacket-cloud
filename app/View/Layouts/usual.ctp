<?php
/*
* Load Header
*/
echo $this->element('header', array());
?>

    <div class="container wrapper">
        <?php echo $this->fetch('content'); ?>
    </div>
<?php
/*
* Load Footer
*/
echo $this->element('footer');
?>
