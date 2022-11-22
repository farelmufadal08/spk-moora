<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div id="login">
        <form action="<?= base_url('login') ?>" method="POST">
            <div class="form-input">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email">
            </div>

            <div class="form-input">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password">
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>