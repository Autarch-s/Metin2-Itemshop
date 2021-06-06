<!doctype html>
<html lang="hu">
    <head>
        <!--
           Készítette: https://pellerichard.hu a DDMT2 részére
           E-mail: whadez@icloud.com
           Discord: whadez#4817
       -->

        <!-- Meta tagek -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <!-- Oldal információk -->
        <title>DDMT2 S2 Itemshop</title>
        <link rel="icon" type="image/png" href="/public/images/favicon.png"/>
    </head>
    <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">DDMT2 S2 Itemshop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Főoldal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/itemshop">Itemshop</a>
                </li>
            </ul>
        </div>

        <div class="form-inline my-2 my-lg-0">
            <button class="btn btn-danger my-2 my-sm-0" onclick="user.logout();">Kijelentkezés</button>
        </div>
    </nav>
    @body

        <!-- Lokális JS -->
        <script src="/public/js/itemshop.js?tt=<?php echo time(); ?>"></script>
        <script src="/public/js/user.js?tt=<?php echo time(); ?>"></script>

        <!-- CDN -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </body>
</html>