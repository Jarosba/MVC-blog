<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $title; ?></title>
        <link href="/public/styles/bootstrap.css" rel="stylesheet">
        <link href="/public/styles/admin.css" rel="stylesheet">
        <link href="/public/styles/font-awesome.css" rel="stylesheet">
        <script src="/public/scripts/jquery.js"></script>
        <script src="/public/scripts/form.js"></script>
        <script src="/public/scripts/popper.js"></script>
        <script src="/public/scripts/bootstrap.js"></script>
        <script src="/public/scripts/core.js"></script>
    </head>
    <body class="fixed-nav sticky-footer bg-dark">
    <?php if ($this->route['action'] != 'signin' and $this->route['action'] != 'signup'): ?>


            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">

                <a class="navbar-brand" href="/account/posts"><?php #echo $vars['account'];?> panel</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>




                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                        <li class="nav-item">
                            <a class="nav-link" href="/account/profile">
                                <i class="fa fa-fw fa-plus"></i>
                                <span class="nav-link-text">My profile</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/account/add">
                            <i class="fa fa-fw fa-plus"></i>
                            <span class="nav-link-text">Add post</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/account/posts">
                            <i class="fa fa-fw fa-list"></i>
                            <span class="nav-link-text"> My articles</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/account/logout">
                            <i class="fa fa-fw fa-sign-out"></i>
                            <span class="nav-link-text">Exit</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
    <?php endif; ?>
        <?php echo $content; ?>
        <?php if ($this->route['action'] != 'signin' and $this->route['action'] != 'signup'): ?>
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>&copy; 2018, made by Iaroslav</small>
                    </div>
                </div>
            </footer>
        <?php endif; ?>
    </body>
</html>