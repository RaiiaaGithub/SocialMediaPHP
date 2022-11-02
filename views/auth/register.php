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
    $title = "Sign In";
    require_once '../layout/_header.php';
?>

<?php
    require_once '../layout/_flashMessages.php';
?>


<main class="auth">
    <form action="../../controllers/auth/register-controller.php" method="post" class="form-auth">
        <div class="form-wrapper">
            <div class="form-title">
                <h2>Sign In</h2>
            </div>
            <div class="form-controls">
                <label for="username">Utilizador</label>
                <input type="text" name="username" placeholder="Escreva o nome de utilizador">
            </div>
            <div class="form-controls">
                <label for="email">E-mail</label>
                <input type="text" name="email" placeholder="Escreva o e-mail">
            </div>
            <div class="form-controls">
                <label for="password">Palavra-passe</label>
                <input type="password" name="password" placeholder="Escreva a palavra-passe">
            </div>
            <div class="form-controls">
                <label for="confirmPassword">Confirmar Palavra-passe</label>
                <input type="password" name="confirmPassword" placeholder="Confirme a palavra-passe">
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
        <div class="auth-action">
            <h3>Já tens conta?</h3>
            <a href="login.php">Entra</a>
        </div>
    </form>
</main>


<?php
    require_once '../layout/_footer.php';
?>
