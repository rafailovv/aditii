<header class="header">
    <a href="/index.php">
        <img class="header-link-logo" src="img/logo.png" alt="logo: Aditii">
    </a>
    <a href="/cart.php" class="header-cart">
        <img class="header-cart-icon" src="img/cart.png" alt="icon: cart">

        <?php if (isset($_SESSION['total_price'])) : ?>

            <h3 class="header-cart-price"><?= $_SESSION['total_price'] ?>$</h3>
        
        <?php else: ?>

            <h3 class="header-cart-price">0$</h3>
            
        <?php endif; ?>

    </a>
</header>
<nav class="nav">
    <ul class="nav-menu">
        <li class="nav-menu-item"><a href="/handbags.php" class="nav-menu-item-link">HANDBAGS</a></li>|
        <li class="nav-menu-item"><a href="/wallets.php" class="nav-menu-item-link">WALLETS</a></li>|
        <li class="nav-menu-item"><a href="/accessories.php" class="nav-menu-item-link">ACCESSORIES</a></li>|
        <li class="nav-menu-item"><a href="/shoes.php" class="nav-menu-item-link">SHOES</a></li>|
        <li class="nav-menu-item"><a href="/men.php" class="nav-menu-item-link">MEN</a></li>|
        <li class="nav-menu-item"><a href="/women.php" class="nav-menu-item-link">WOMEN</a></li>|
        <li class="nav-menu-item"><a href="/contacts.php" class="nav-menu-item-link">CONTACT US</a></li>
    </ul>
</nav>