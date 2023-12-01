<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/login/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="">
</head>

<body>
<h3>
    <?php if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
    } ?>
</h3>
<div class="container" id="container" style="text-align: center">
    <h2>Quên mật khẩu</h2>
    <form action="index.php?controller=quenMatKhau&nhapEmail" method="post">
        <label for="email">Nhập email của bạn tại đây</label>
        <input type="email" name="email" required>
        <input type="submit" value="Gửi">
    </form>
    <button><a href="index.php?controller=dangNhap">Trở về lại trang đăng nhập</a></button>
</div>
</body>

</html>
<script src="assets/js/login/js.js"></script>