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

    <meta name="description" content="Klinik Polban - Salam Sehat Warga Politeknik Negeri Bandung">
    <meta name="author" content="Aqil Rahaman, Faizal Abdul Hakim, Caturiani Pratidina Bintari ">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://lh3.googleusercontent.com/proxy/V3Y6jGM8lTfgyZ9QEUYtqQf7LmEV1FbAgmem4NkFoEe2Ulu6LmOnu0-DT5BLInS0MHUxKmuWqoY1-lReFLOlBuk_lbihQRtZPfviIsGbqPfaEVFjqtYBGnFmDrey3prqyWY" sizes="180x180">
    <link rel="icon" href="https://lh3.googleusercontent.com/proxy/V3Y6jGM8lTfgyZ9QEUYtqQf7LmEV1FbAgmem4NkFoEe2Ulu6LmOnu0-DT5BLInS0MHUxKmuWqoY1-lReFLOlBuk_lbihQRtZPfviIsGbqPfaEVFjqtYBGnFmDrey3prqyWY" sizes="32x32" type="image/png">
    <link rel="icon" href="https://lh3.googleusercontent.com/proxy/V3Y6jGM8lTfgyZ9QEUYtqQf7LmEV1FbAgmem4NkFoEe2Ulu6LmOnu0-DT5BLInS0MHUxKmuWqoY1-lReFLOlBuk_lbihQRtZPfviIsGbqPfaEVFjqtYBGnFmDrey3prqyWY" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://lh3.googleusercontent.com/proxy/V3Y6jGM8lTfgyZ9QEUYtqQf7LmEV1FbAgmem4NkFoEe2Ulu6LmOnu0-DT5BLInS0MHUxKmuWqoY1-lReFLOlBuk_lbihQRtZPfviIsGbqPfaEVFjqtYBGnFmDrey3prqyWY" color="#563d7c">
    <link rel="icon" href="https://lh3.googleusercontent.com/proxy/V3Y6jGM8lTfgyZ9QEUYtqQf7LmEV1FbAgmem4NkFoEe2Ulu6LmOnu0-DT5BLInS0MHUxKmuWqoY1-lReFLOlBuk_lbihQRtZPfviIsGbqPfaEVFjqtYBGnFmDrey3prqyWY">
    <meta name="msapplication-config" content="/docs/4.0/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@kojolah">
    <meta name="twitter:creator" content="@kojolah">
    <meta name="twitter:title" content="Klinik Polban">
    <meta name="twitter:description" content="Salam Sehat Warga Politeknik Negeri Bandung">
    <meta name="twitter:image" content="https://lh3.googleusercontent.com/proxy/V3Y6jGM8lTfgyZ9QEUYtqQf7LmEV1FbAgmem4NkFoEe2Ulu6LmOnu0-DT5BLInS0MHUxKmuWqoY1-lReFLOlBuk_lbihQRtZPfviIsGbqPfaEVFjqtYBGnFmDrey3prqyWY">

    <!-- Facebook -->
    <meta property="og:url" content="https://klinikpolban.my.id/">
    <meta property="og:title" content="Klinik Polban">
    <meta property="og:description" content="Salam Sehat Warga Politeknik Negeri Bandung">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://lh3.googleusercontent.com/proxy/V3Y6jGM8lTfgyZ9QEUYtqQf7LmEV1FbAgmem4NkFoEe2Ulu6LmOnu0-DT5BLInS0MHUxKmuWqoY1-lReFLOlBuk_lbihQRtZPfviIsGbqPfaEVFjqtYBGnFmDrey3prqyWY">
    <meta property="og:image:secure_url" content="https://lh3.googleusercontent.com/proxy/V3Y6jGM8lTfgyZ9QEUYtqQf7LmEV1FbAgmem4NkFoEe2Ulu6LmOnu0-DT5BLInS0MHUxKmuWqoY1-lReFLOlBuk_lbihQRtZPfviIsGbqPfaEVFjqtYBGnFmDrey3prqyWY">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">    

    <style type="text/css">
        /*body{
            background-image: url('https://wallpaperaccess.com/full/1282794.jpg');
            position: relative;
            background-size: cover;
            background-repeat: no-repeat;
        }*/

    </style>
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="POST" action="<?= base_url('login') ?>" class="needs-validation" novalidate>
                        <h1>Login SI Klinik Sehat</h1>
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