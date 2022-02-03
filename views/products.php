<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challange - Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/store.css">
</head>

<?php require_once '../php/api/Utils/validateLogin.php'; ?>

<?php require_once 'clientNavbar.php'; ?>

<body>
    <!-- Modal -->
    <div id="modal" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content customModal">
                <div class="modal-header d-flex justify-content-between align-items-center">
                    <h5 class="modal-title">Venda</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row justify-content-end">
                            <div><span class="small-info">Total </span><span id="total"></span></div>
                        </div>
                        <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Preço Unidade</th>
                                </tr>
                            </thead>
                            <tbody id="modalTableContent">
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
        <div id="toast" id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Favoritos</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toast-message">

            </div>
        </div>
    </div>
    <div id="sideContainer" class="side-container">
        <div id="cartContainer" class="cart-container animate__animated">
            <div class="header">
                <div class="cart-logo">
                    <img src="../Resources/logoDark.svg" style="height: 100%;width: 150px;" alt="logo" loading="lazy">
                </div>
                <div class="title">
                    <h5>Carrinho de compras</h5>
                    <i id="cartClose" class="fas fa-times"></i>
                </div>
                <span>Total (<span id="cartProductCount"></span>) <span id="cartProductTotalPrice"></span><span id="currency_symbol"></span></span>
            </div>
            <div class="cart-content" id="cartContent">
            </div>
            <div class="d-flex justify-content-center" style="padding: 1rem;">
                <button onclick="checkout()" type="button" class="btn btn-outline-primary">Finalizar Compra</button>
            </div>
        </div>
    </div>
    <div class="container">
        <section id="Categories">
            <div class="row">
                <div class="container-fluid justify-content-around">
                    <div class="row justify-content-around">
                        <div class="search-bar">
                            <label id="searchButton" for="searchBar" onclick="searchProduct()">
                                <i class="fas fa-search"></i>
                            </label>
                            <input id="searchBar" type="text" placeholder="Pesquisar Produtos" name="search">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="Products">
            <div class="row justify-content-around">
                <div class="d-flex justify-content-center content-color-primary section-title">
                    <h1 class="title">Produtos</h1>
                </div>
                <div class="container">
                    <div id="products" class="row"></div>
                </div>
            </div>
        </section>
        <div class="d-flex justify-content-center animate__animated animate__pulse animate__infinite">
            <div id="buttonLoadMore" onclick="loadMore()">Ver Mais</div>
        </div>
    </div>
</body>

<?php include 'footer.php'; ?>

<!--Scripts-->
<script src="../Scripts/theme.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="../Scripts/store.js"></script>

</html>