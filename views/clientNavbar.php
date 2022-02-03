<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challange - Shop</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/clientNavbar.css">
</head>

<body>
    <header>
        <nav class="nav">
            <div class="container-fluid d-flex justify-content-between">
                <a class="nav-logo" href="products.php">
                    <img src="../Resources/logoLight.svg" />
                </a>
                <div class="nav-content">
                    <?php
                    if (!isset($_GET['cart'])) {
                        echo '  <div>
                                    <label for="select_currency">Currency</label>
                                    <select class="form-select form-select-sm" id="select_currency">
                                        <option value="eur">Euro €</option>
                                        <option value="real">Real R$</option>
                                        <option value="dollar">Dollars $</option>
                                    </select>
                                </div>
                                <div class="cart" id="navCart">
                                    <div class="cart-count">
                                        <span id="navCartCount"></span>
                                    </div>
                                    <i class="fas fa-shopping-cart"></i>
                                </div>';
                    }
                    ?>
                    <div class="nav-user-container" id="nav-user-container">
                        <img id="navBarUserImg" src="../Resources/user.png" alt="User Image">
                        <i class="fas fa-chevron-down" style="margin-left: 15px;"></i>
                        <div class="options" id="options">
                            <div class="user-data">
                                <span>Bem-Vindo</span>
                                <div class="username">
                                    <span><?php echo $_SESSION['user']['Username']; ?></span>
                                </div>
                            </div>
                            <a href="/challange/views/updateAccount.php">
                                <button class="button"><i class="fas fa-user"></i> Conta</button>
                            </a>
                            <button class="button" onclick="changeTheme()"><i id="themeIndicator" class="far fa-lightbulb"></i> Tema</button>
                            <div class="separator"></div>
                            <button class="button content-color-primary" onclick="logOut()"><i class="fas fa-sign-out-alt"></i>Sair</button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</body>

<script src="../Scripts/ClientNavbar.js"></script>

</html>