<?php
/*
* Load Header
*/
echo $this->element('header', array());
?>

    <div class="container wrapper">
        <div class="row thumbs">
        <?php for($i = 0;$i < 12;$i++): ?>
            <div class="col-xs-6 col-md-3">
                <a href="../artworks-000127415740-3mpi40-t500x500.jpg" class="thumbnail">
                    <img src="../artworks-000127415740-3mpi40-t500x500.jpg" alt="...">
                </a>
            </div>
        <?php endfor; ?>
        </div>
    </div>
<?php
/*
* Load Footer
*/
echo $this->element('footer');
?>
