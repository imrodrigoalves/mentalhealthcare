<?php
    include_once('header.php');
    include_once('includes/functions.inc.php');
    if($_SESSION['tipoutilizador'] == 'admin'){
?>

<!-- Div de Confirmação de eliminar utilizador -->
<div id="overlaydelete" class='overlay'>
    <div class="centervertical">
        <div class='confirmationdelete'>
            <h3>Tem a certeza desta ação ?</h3>
            <div class="centervertical">
            <div class='confirmbuttons'><a href='#Cancelar' id='closeoverlaydelete'><img src='imgs/cancelar.png' class='size24'></a></div>    
                <div id='getdeletecontent' class='confirmbuttons'>
                    <form name='deletionactivate' action='includes/deactivateuseradmin.inc.php' method='POST'>
                        <input type='hidden' id='usertodelete' name='whatusertodelete' value=''>
                        <input type='hidden' name='submitdelete' value='submit'>
                        <input type='image' class='size24' src='imgs/yes.png'>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fim Confirmação de eliminar utilizador -->

<!-- -->
<div class='wrapper admin'>
<!-- Função PHP para MOSTRAR ERROS -->
<?php displayerrors(); ?>
    <!-- UTILIZADORES -->
    <div id="Utilizadores">
        <hr>
        <h2>Utilizadores</h2>
        <hr>
        <div class="centervertical">
            <!-- CAIXA LISTAGEM DE UTILIZADORES -->
            <div class="users">
                <h4>Lista de Utilizadores:</h4>
                <a href="#AtualizarUtilizadores" class='reload' onclick='reloaduser();'><img src='imgs/recarregar.png' class='img-center size24'></a>
                <div class="listofusers">
                    <ul id='reloadusers'>
                        <!-- Função PHP para listar utilizadores -->
                        <?php include_once('includes/loadusers.inc.php'); ?>
                    </ul>
                </div>
            </div>

            <!-- FORMULÁRIO PARA UPDATE DE TIPO DE UTILIZADOR -->
            <div class='updateusers'>
                <div class="updateuser-withdata">
                    <form action='includes/updateuseradmin.inc.php' method="POST">
                        <h4><img id="avatartoset" class='img-center avatar avatar50' src='imgs/avatar/defaultuser.png'> <span id='selecteduser'>Selecione um utilizador</span></h4>
                        <input type="hidden" id='usertochange' name="user" value="">
                        <p>Tipo de utilizador: <span id='selectedusertypeuser'></span></p>
                        <p>Alterar tipo utilizador: <select id="whattheuser" name="changetypeuser">
                            <option value="user">Utilizador</option>
                            <option value="quoter">Quoter</option>
                            <option value="moderador">Moderador</option>
                            <option value="admin">Administrador</option>
                        </select></p>
                        <a href="#" onclick="closeloaddatauser();">Limpar</a> 
                        <input type="submit" name="updateuseradmin" value="Atualizar">
                    </form>
                    <a href='#EliminarUtilizadores' id='deletebtn' class='openoverlaydelete deletebutton'> Desativar conta </a>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <!-- FIM UTILIZADORES -->

    <!--  -->
    <!-- POSTS -->
    <div class='latestquotesandposts'>
        <h2>Posts</h2>
        <a href="#AtualizarPosts" class='reload' onclick='reloadposts();'><img src='imgs/recarregar.png' class='img-center size24'></a>
        <hr>
        <div id="latestposts" class="postzone">
            <!-- Função PHP para ÚLTIMOS 3 POSTS -->
            <?php include_once('includes/lastestposts.inc.php'); ?>
        </div> 
        <hr>
    </div>
    <!-- FIM POSTS -->

    <!--  -->
    <!-- QUOTES -->
    <div class='latestquotesandposts'>
        <h2>Quotes</h2>
        <a href="#AtualizarQuotes" class='reload' onclick='reloadquotes();'><img src='imgs/recarregar.png' class='img-center size24'></a>
        <hr>
        <div id="latestquotes" class="quotezone">
            <!-- Função PHP para ÚLTIMOS 3 QUOTES -->
            <?php include_once('includes/lastestquotes.inc.php'); ?>
        </div> 
        <hr>
    </div>
    <!-- FIM QUOTES -->    
</div>

<script type='text/javascript'>
    $('.openoverlaydelete').on('click', function () {
         $('#overlaydelete').toggle();
    } );
    $('#closeoverlaydelete').on('click', function () {
         $('#overlaydelete').toggle();
    } );

    function deletepost(post){  
        var elemento =  document.getElementById('getdeletecontent'); 
        elemento.innerHTML = "";
        elemento.innerHTML = "<form action='includes/deletepostadmin.inc.php' method='POST'><input type='hidden' name='idpost' value='"+ post +"'><input type='hidden' name='submitdelete' value='submit'><input type='image' class='size24' src='imgs/yes.png'></form>";
    }
    function deletequote(idquote){  
        var elemento =  document.getElementById('getdeletecontent');
            elemento.innerHTML = "";
            elemento.innerHTML = "<form action='includes/deletequotesadmin.inc.php' method='POST'><input type='hidden' name='idquotes' value='"+ idquote +"'><input type='hidden' name='submitdelete' value='submit'><input type='image' class='size24' src='imgs/yes.png'></form>";
    }
</script>
<?php     
    }
    else{
        $_SESSION['errors'] = "Não é um Administrador.";
        header("Location: index.php");
        exit();
    }
    include_once('footer.php');
?>