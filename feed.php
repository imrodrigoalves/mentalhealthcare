<?php
    include_once('includes/connection.inc.php');
    include_once('includes/functions.inc.php');
    include_once('header.php');
?>
    <!-- Center Wrapper -->
    <div class="wrapper background-feed">
        <!-- Div de Confirmação de eliminar dados -->
        <div id="overlaydelete" class='overlay' onclick='closeoverlay();'>
            <div class="centervertical">
                <div class='confirmationdelete'>
                     <h3>Pretende eliminar este post ?</h3>
                     <div class="centervertical">
                        <div class='confirmbuttons'><a href='#' id='closeoverlaydelete'><img src='imgs/cancelar.png' class='size24'></a></div>    
                         <div id='getdeletecontent' class='confirmbuttons'></div>
                     </div>
                 </div>
            </div>
        </div><!-- Fim Div Confirmação de eliminar dados -->
        <!--  -->
       <?php echo displayerrors(); ?>
        <!-- Loader Posts From Data Base -->
        <div class="postzone">
        <br>
            <?php
              $query = "SELECT post.* , user.avatar FROM post, user WHERE post.author = user.username AND user.status != 'deactivated'  ORDER BY id_post DESC";
              $result = mysqli_query($conn, $query);
              $resultCheck = mysqli_num_rows($result);
                if($resultCheck >= 1){
                    for($i=1;$i<=$resultCheck;$i++){
                        $data = mysqli_fetch_assoc($result);
                        $content = $data['content'];
                        $author = $data['author'];
                        $date = $data['data_insert'];
                        $avatar = $data['avatar'];
                        ?>            
            <div class="box-post">
                <?php 
                    if($_SESSION['utilizador'] != "Anónimo" && ($_SESSION['tipoutilizador'] == 'admin' || $_SESSION['tipoutilizador'] == 'moderador' || $_SESSION['utilizador'] == $author)){
                        echo "<div class='formdelete'><a href='#' class='openoverlaydelete' onclick='deletepost(".$data['id_post'].");'><img src='imgs/eliminar.png' class='size24'></a></div>";
                    }
                    ?>
                <p class='post-content'><?php echo $content ?></p>
                <p class='post-author'><img class='img-center avatar avatar50' src="imgs/avatar/<?php echo $avatar;?>"> <?php echo $author;?></p>
                <p class='post-date'><?php echo $date ?></p>
            </div>
            <?php         
                    } //For 
                }else{
                    echo "Ainda ninguém postou nada. <img src='imgs/sadface.png'>";
                } //End If              
                ?>
        </div><!-- Fim Loader Posts From Data Base -->
        <!--  -->
        <!-- Botão para abrir o Formulário -->
        <a id="openinput" class="btn btn-circle"><img src="imgs/plus.svg"></a>
        <!--  -->
        <!-- Formulário para inserção da Quote -->
        <div id="inputpost" onclick='closeoverlay();'>
            <!-- Overlay -->
            <div class="controllerposition">
                <!-- BOX -->
                <div class="postinput">
                    <a id="closeinput" class="btn btn-hide"><img src="imgs/close.png"></a><br>
                    <div>
                        <form action="includes/sendpost.inc.php" method="POST">
                        <h3>Conta-nos o que estás a pensar..</h3>
                        <?php 
                                echo "<textarea rows='7' cols='36' id='lengthPost' name='post' maxlength='255' placeholder='Escreve uma mensagem...' required></textarea>";
                                if($_SESSION['sessao'] == true){     
                                    echo "<br><input type='radio' name='user' value='Anónimo' checked>Anónimo";
                                    echo "<input type='radio' name='user' value='".$_SESSION['utilizador']."'>".$_SESSION['utilizador']."";
                                }
                                ?>                         
                            <input type="hidden" name='submit' value='submit'>
                            <input id='sendPostBtn' type="image" src="imgs/enviar.png" >
                        </form>
                    </div>
                </div><!-- End Box -->
            </div><!-- End Overlay  -->
        </div><!-- End Form Add Quote -->
    </div>
</div>
    <script type='text/javascript'>
    $('#openinput').on('click', function () {
      $('#inputpost').toggle();
    });
    $('#closeinput').on('click', function () {
      $('#inputpost').toggle();
    });
    $('.openoverlaydelete').on('click', function () {
         $('#overlaydelete').toggle();
    } );
    $('#closeoverlaydelete').on('click', function () {
         $('#overlaydelete').toggle();
    } );
    function deletepost(post){  
    var elemento =  document.getElementById('getdeletecontent');
        elemento.innerHTML = "";
        elemento.innerHTML = "<form action='includes/deletepost.inc.php' method='POST'><input type='hidden' name='idpost' value='"+ post +"'><input type='hidden' name='submitdelete' value='submit'><input type='image' class='size24' src='imgs/yes.png'></form>";
    }
    </script>
<?php include_once('footer.php'); ?>