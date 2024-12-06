<?php

require_once "./Repository/Database.php";

$db = new Database();

if (isset($_POST["register"])) {
    if ($db->register($_POST) > 0) {
        echo "<script>
        alert('Berhasil Register');
        document.location.href = 'beranda.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal Register');
        document.location.href = 'register.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <title>Registrasi</title>
</head>
<style>
    .container {
        width: 40%;
    }
</style>

<body>

    <div class="container">
        <form action="" method="post">
            <div class="mt-3 mb-3 text-center">
                <h1>Registrasi</h1>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="tel" name="telp" class="form-control" id="floatingInput" placeholder="telp" required>
                <label for="floatingInput">Telp</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password2" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Confirm Password</label>
            </div>
            <div class="mb-3">
                <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
            </div>
            <div class="text-center mb-3">
                <p style="display: inline;">Sudah punya akun? </p><a href="login.php">Login</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>