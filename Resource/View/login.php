<form class="form-signin">
    <img class="mb-4" src="/public/images/logo.png" alt="" width="180">
    <h1 class="h3 mb-3 font-weight-normal">Bejelentkező felület</h1>

    <label for="username" class="">Felhasználónév</label>
    <input type="text" id="username" name="username" class="form-control mb-4" required autofocus>

    <label for="password" class="">Jelszó</label>
    <input type="password" id="password" name="password" class="form-control mb-4" required>

    <button class="btn btn-lg btn-primary btn-block" type="button" onclick="user.login();">Bejelentkezés</button>
    <p class="mt-5 mb-3 text-muted">&copy; DDMT2. All rights reserved</p>
</form>

<style>
    body {
        text-align: center;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }
</style>