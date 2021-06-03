<?php 
    include_once('header.php');
    include_once('includes/functions.inc.php');
 ?>        
 <div class="background-login">
    <div class="container-m centervertical">
        <div class="container-sm container-login-frase centervertical">
            <h2>Aproveite cada minuto, porque o tempo não volta. O que volta é a vontade de voltar no tempo...</h2>
        </div>
        <div id="login" class="container-sm container-login centervertical">
            <div>
            <?php echo displayErrors(); ?>
            <h2>Entrar</h2>
             <!-- php -> echo variável SESSION['ERROS'] -->
                <form action="includes/login.inc.php" method="POST">
                    <label for="username"><img class="img-center" src="imgs/user.png"></label>
                        <input type="text" name="username" placeholder="Nome de Utilizador" maxlength="16" required><br>
                    <label for="password"><img class="img-center" src="imgs/password.png"></label>
                        <input type="password" name="password" placeholder="**********" maxlength="255" required>
                        <br><br>
                        <input class='btn-enviarform btn-enviarform-login' type="submit" name="login" value="Entrar">
                </form>
             <hr>
            <p>Ainda não tem conta ? <a href="register.php"><b>Crie aqui »</b></a></p>
          </div>
        </div>
    </div>
 </div>
<?php include_once('footer.php'); ?>