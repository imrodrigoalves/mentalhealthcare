<?php 
    include_once('header.php');
    include_once('includes/functions.inc.php');
?>        
 <div class="background-login">
    <div class="container-m-registo centervertical">
        <div class="container-sm-registo container-login-frase centervertical">
            <h2>Coisas boas vêm para aqueles que sabem esperar.</h2>
        </div>
        <div id="login" class="container-sm-registo container-login centervertical">
            <div>
            <?php echo displayErrors(); ?>
            <h2>Registo</h2>
               <form action="includes/register.inc.php" method="POST">
                   <label for="username"><img class="img-center" src="imgs/user.png"></label>
                       <input type="text" name="username" required placeholder="Nome de Utilizador" maxlength="16">
                   <br><label for="pwd"><img class="img-center" src="imgs/password.png"></label>
                       <input type="password" name="pwd" placeholder="Password" required maxlength="255">
                   <br><label for="pwdverify"><img class="img-center" src="imgs/password.png"></label>
                       <input type="password" name="pwdverify" placeholder="Verificar password" required maxlength="255">
                   <br><label for="email"><img class="img-center" src="imgs/email.png"></label>
                       <input type="email" name="email" placeholder="example@example.com" maxlength="64" required>
                   <br>
                       <input class='btn-enviarform btn-enviarform-registo' type="submit" name="register" value="Registar">
               </form>
            <hr>
           <p>Já tem uma conta ? <a href="login.php"><b>Entre aqui »</b></a></p>
          </div>
        </div>
    </div>
 </div>
<?php include_once('footer.php'); ?>