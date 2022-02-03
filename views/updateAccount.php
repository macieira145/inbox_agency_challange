<?php session_Start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quickshop - Alterar dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/updateAccount.css">
</head>

<?php require '../php/api/Utils/validateLogin.php'; ?>

<?php
    $_GET['cart'] = 0; 
    require_once 'clientNavbar.php'; 
?>

<body>
    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: var(--background-color); color: var(--text-color);">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Confirmação</h5>
                </div>
                <div class="modal-body" id="modalMessage">
                    Para que as alterações sejam efetuadas é necessário inserir a sua palavra-passe atual para confirmação adicional.
                    <!--Nome próprio-->
                    <div class="col-sm-6">
                        <label for="password" class="form-label">Palavra-Passe</label>
                        <input type="password" class="form-control" id="checkPassword" placeholder="" required name="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="checkCredentials()">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <main>
            <div class="col-md">
                <div class="d-flex justify-content-center content-color-primary section-title">
                    <h1 class="title">Dados Pessoais</h1>
                </div>
                <h4 class="mb-3">Informações Pessoais</h4>
                <form id="form" class="needs-validation">
                    <div class="row g-3">
                        <!--Nome próprio-->
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Nome Próprio</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $_SESSION['user']['name'];?>" required name="name">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <!--Apelido-->
                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Apelido</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $_SESSION['user']['surname']; ?>" required name="surname">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>

                        <!--Nome de utilizador-->
                        <div class="col-12">
                            <label for="username" class="form-label">Nome de utilizador</label>
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <input type="text" class="form-control" id="username" placeholder="Username" required name="username" value="<?php echo $_SESSION['user']['username']; ?>">
                                <div id="usernameMessage" class="invalid-feedback">
                                    O nome de utilizador já existe. Escolha outro.
                                </div>
                            </div>
                        </div>

                        <!--Email-->
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" value="<?php echo $_SESSION['user']['email']; ?>">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <!--Nome próprio-->
                        <div class="col-sm-6">
                            <label for="password" class="form-label">Palavra-Passe</label>
                            <input type="password" class="form-control" id="password" placeholder="" name="password">
                            <div class="invalid-feedback" id="passwordMessage">
                                Ambas as passwords têm que ser iguais
                            </div>
                        </div>

                        <!--Apelido-->
                        <div class="col-sm-6">
                            <label for="password-confirmation" class="form-label">Confirmar Palavra-Passe</label>
                            <input type="password" class="form-control" id="password-confirmation" placeholder="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Alterar</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="../Scripts/theme.js"></script>
<script src="../Scripts/updateAccount.js"></script>

</html>