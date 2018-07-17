<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $title; ?></title>
        <link href="/public/styles/bootstrap.css" rel="stylesheet">
        <link href="/public/styles/main.css" rel="stylesheet">
        <link href="/public/styles/font-awesome.css" rel="stylesheet">
        <script src="/public/scripts/jquery.js"></script>
        <script src="/public/scripts/form.js"></script>
        <script src="/public/scripts/popper.js"></script>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="/">Traveller</a>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/account/signup">sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/account/signin" >sign in</a>


                    </ul>
                </div>
            </div>
        </nav>








        <?php echo $content; ?>
        <hr>



        <footer class="fixed-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">

                        <nav class="navbar navbar-expand-lg navbar-light " >



                                <a class="copyright text-muted" href="/about">About project</a>
                            <ul class="navbar-nav ml-auto">

                                <a class="copyright text-muted" href="/help">Help</a>
                            </ul>

                        </nav>

                        <p class="copyright text-muted">&copy; 2018, made by PHP framework</p>
                    </div>
                </div>
            </div>
        </footer>




    </body>
</html>