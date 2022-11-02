<?php
require_once '../../helper/utils.php';

ini_set("session.cookie_httponly", "True");
ini_set("session.cookie_secure", "True");
session_start(); 
session_regenerate_id();

if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    redirect('../home/index.php');
}
?>


<?php
    $title = "Login";
    require_once '../layout/_header.php';
?>

<?php
    require_once '../layout/_flashMessages.php';
?>

<main class="auth">
    <form action="../../controllers/auth/login-controller.php" method="post" class="form-auth">
        <div class="form-wrapper">
            <div class="form-title">
                <h2><?= $title ?></h2>
            </div>
            <div class="form-controls">
                <label for="username">Utilizador</label>
                <input type="text" name="username" placeholder="E-mail ou utilizador">
            </div>
            <div class="form-controls">
                <label for="password">Palavra-passe</label>
                <input type="password" name="password" placeholder="Palavra-passe">
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </div>
        <div class="auth-action">
            <h3>Não tens conta ainda?</h3>
            <a href="register.php">Registra-te</a>
        </div>
    </form>
</main>

<?php
    require_once '../layout/_footer.php'
?>