<?php
$login = 'login';
if (isset($_SESSION['userid']))
{
  $login = 'logout';
}
if (isset($_GET['logout']))
{
  session_unset();
  session_destroy();
  header("Location:loginpage.php");
}
?>
<head>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
  <body>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li class="dropdown">
        <a href="#" class="dropbtn">Products</a>
          <div class="dropdown-content">
            <a href="laptops.php">Laptops</a>
            <a href="phones.php">Smartphones</a>
            <a href="tablets.php">Tablets</a>
          </div>
        </li>
        <li><a href="cart.php">Cart</a></li>
        <?php if ($login == 'login'): ?>
        <li><a href="loginpage.php">Sign in</a></li>
        <?php else: ?>
        <li><a href="loginpage.php?logout=1"> Sign Out </a></li>
        <?php endif; ?>
        <li><a href="aboutus.php">About Us</a></li>
      </ul>
</nav>