<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?> | Klinik</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/') ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets/') ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('assets/') ?>vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/') ?>build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="POST" action="<?= base_url('login') ?>" class="needs-validation" novalidate>
                        <h1>Login SI Klinik</h1>
                        <?php if ($this->session->flashdata('gagal') != "") { ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $this->session->flashdata('gagal') ?>
                            </div>
                        <?php } ?>
                        <div>
                            <input type="text" class="form-control" name="username" placeholder="Username" required />
                            <p>
                            <div class="invalid-feedback">
                                Username harus diisi.
                            </div>
                            </p>
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="Password" required />
                            <p>
                            <div class="invalid-feedback">
                                Password harus diisi.
                            </div>
                            </p>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-secondary btn-block">Login</button>
                            <!-- <a class="btn btn-dark submit" href="index.html">Log in</a> -->
                            <!-- <a class="reset_pass" href="#!">Lost your password?</a> -->
                        </div>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <p>©2021 All Rights Reserved. Kelompok 3B.</p>
                            <p>Privacy and Terms</p>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/validator/multifield.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/validator/validator.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>