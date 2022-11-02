<?php
require_once '../../helper/utils.php';

ini_set("session.cookie_httponly", "True");
ini_set("session.cookie_secure", "True");
session_start(); 
session_regenerate_id();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != true) {
    redirect('../auth/login.php');
}
?>

<?php
    require_once '../layout/_header.php';
?>

<main class="home">
    <div class="main-wrapper">
        <form enctype="multipart/form-data" action="../../controllers/home/create-controller.php" method="post">
            <div class="field">
                <label for="label">Escolha uma imagem</label>
                <div class="control">
                    <input type="file" name="image" id="form-img">
                </div>
            </div>

            <div class="field">
                <label for="label">Título</label>
                <div class="control">
                    <input type="text" name="title">
                </div>
            </div>

            <div class="field">
                <label for="label">Descrição</label>
                <div class="control">
                    <input type="text" name="description">
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-danger" type="submit">Submit</button>
                </div>
                <div class="control">
                    <button class="button is-danger is-outlined" type="reset">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</main>

<?php
    require_once '../layout/_footer.php';
?>

