<?php echo $this->Html->docType('html5'); ?>
    <head>
    <?php echo $this->Html->charset(); ?>
    <?php echo $this->Html->css('bootstrap'); ?>
    <?php echo $this->Html->css('bootflat'); ?>
    <?php echo $this->Html->css('touchTouch'); ?>
    <?php echo $this->Html->css('style'); ?>
    </head>
    <body>
    <header>
        <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <?php echo $this->Html->link('Jacket Cloud', array(
                'controller' => 'streams',
                'action'      => 'index'),
                array('class' => 'navbar-brand')
            ); ?>
            </div><!-- .navbar-header -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="http://localhost/disc-jacky/stream">Stream <span class="sr-only">(current)</span></a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-search search-only">
                        <i class="search-icon glyphicon glyphicon-search"></i>
                        <input type="text" class="form-control search-query">
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <?php echo $this->Html->link('Upload', array(
                            'controller' => 'uploads',
                            'action'     => 'index'
                        )); ?>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Name <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost/jacket-cloud/users">Profile</a></li>
                            <li><a href="http://localhost/disc-jacky/users/index/Taishi/likes">Likes</a></li>
                            <li><a href="#">Following</a></li>
                            <li>
                                <?php echo $this->Html->link('Login', array(
                                    'controller' => 'users',
                                    'action'     => 'facebook'
                                )); ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Logout', array(
                                    'controller' => 'users',
                                    'action'     => 'logout'
                                )); ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
        </nav>
    </header>
