    <!-- Bootstrap -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <?php echo $this->Html->script('bootstrap.min'); ?>
    <!-- Bootflat's JS files.-->
    <?php echo $this->Html->script('icheck.min'); ?>
    <?php echo $this->Html->script('jquery.fs.selecter.min'); ?>
    <?php echo $this->Html->script('jquery.fs.stepper.min'); ?>
    <!-- Touch Touch -->
    <?php echo $this->Html->script('touchTouch.jquery'); ?>
    <script>
    $(function(){
        // Initialize the gallery
        $('.thumbs a').touchTouch();
    });
    </script>
</body>
</html>
