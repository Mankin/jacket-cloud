<?php
/*
* Load Header
*/
echo $this->element('header', array());
?>

    <div class="container wrapper">
        <div class="works-wrapper">
        </div>
    </div>
<?php
/*
* Load Footer
*/
echo $this->element('footer', array(), array('cache' => true));
?>
