<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?> | SI Klinik</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="<?= base_url('assets/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/') ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets/') ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url('assets/') ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->

    <link href="<?= base_url('assets/') ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/') ?>build/css/custom.min.css" rel="stylesheet">
    <!-- fontawesome -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
    </script> -->

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
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">