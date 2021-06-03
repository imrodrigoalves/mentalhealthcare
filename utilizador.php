<?php
    include_once('header.php');
    include_once('includes/functions.inc.php');
    if($_SESSION['sessao'] == true){
?>
<div class="wrapper">
    <!-- Função PHP para MOSTRAR ERROS -->
    <?php echo displayErrors(); ?>

    <div class="dadosutilizador">
        <br>
        <div class="userimg">
            <span class="userinfo-changeimg" onclick="document.getElementById('userImage').click();">
                <h4>Alterar Imagem</h4>
                <form action="includes/senduserimage.inc.php" name="formUserImage" method="POST" enctype="multipart/form-data">
                    <input type="file" name="image" id="userImage" style="display:none;" accept="image/*" />
                </form>
            </span>
            <img class='img-center avatar avatar100' src='imgs/avatar/<?php echo $_SESSION['avatar']?>'>
        </div>
        <h3 id='username'><?php echo $_SESSION['utilizador']?></h3>
        <div class='centervertical'>
            <ul id='targetNewLi'>
                <li>Email:</li>
                <li>Nova Password:</li>
                <li class="idx">Validar Nova Password:</li>
            </ul>
            <div>
                <form action="includes/updateuser.inc.php" name='newdatauser' method="POST">        
                    <ul id='targetForm'>
                        <?php include_once('includes/loaddatauser.inc.php'); ?>
                    </ul>
                </form>
            </div>
        </div>
        <p id='btnAlterarDados' class='btn btn-rounded' onclick="loadFormwithdata('<?php echo $_SESSION['utilizador'] ?>','<?php echo $_SESSION['email'] ?>');">Alterar dados</p>
    </div>     
</div>
<script type="text/javascript">
    document.getElementById("userImage").onchange = function() {
        document.forms.formUserImage.submit();
    }
</script>
<?php
    }else{
        $_SESSION['errors'] = "Não se encontra a sessão iniciada. Por favor inicie <a href='login.php'>aqui</a> para poder aceder.";
        header("Location: index.php");
        exit();
    }
    include_once('footer.php');
?>