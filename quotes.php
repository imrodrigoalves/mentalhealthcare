<?php
        include_once('includes/connection.inc.php');
        include_once('includes/functions.inc.php');    
        include_once('header.php');
?>
<!-- WRAPPER -->
    <div class="wrapper background-feed">
    <?php echo displayerrors(); ?>
        <!-- Div de Confirmação de eliminar dados -->
        <div id="overlaydelete" class='overlay' onclick='closeoverlay();'>
            <div class="centervertical">
                <div class='confirmationdelete'>
                     <h3>Pretende eliminar este quote ?</h3>
                     <div class="centervertical">
                        <div class='confirmbuttons'><a href='#Cancelar' id='closeoverlaydelete'><img src='imgs/cancelar.png' class='size24'></a></div>    
                         <div id='getdeletecontent' class='confirmbuttons'></div>
                     </div>
                 </div>
            </div>
        </div><!-- Fim Div Confirmação de eliminar dados -->
        <!--  -->
        <!-- Pesquisa -->
        <div class="pesquisarpor">
            <form method="GET">
                <p>Categoria:<select name="pesquisarcategory">
                        <option value="">Tudo</option>
                        <option value="Inspiração">Inspiração</option>
                        <option value="Relações">Relações</option>
                        <option value="Adolescência">Adolescência</option>
                        <option value="Positividade">Positividade</option>
                        <option value="Confiança">Confiança</option>
                        <option value="Espiritual">Espiritual</option>
                        <option value="Felicidade">Felicidade</option>
                        <option value="Seguir em frente">Seguir em frente</option>
                        <option value="Conselho">Conselho</option>
                        <option value="Outro">Outro</option>
                    </select> <input type="image" class='img-center' src="imgs/pesquisa.png" ></p>
                    <input type="hidden" name='submit' value='submit'>           
            </form>
        </div>        
        <!--  -->
        <!-- Loader Quotes From Data Base -->
        <div id="targetQuotes" class="quotezone">  
        <br>
            <?php
                include_once('includes/loadquotes.inc.php');          
            ?>
        </div><!-- Fim Loader Quotes From Data Base -->
        <!-- Botão para abrir o Formulário -->
        <?php
            if($_SESSION['tipoutilizador'] == 'admin' || $_SESSION['tipoutilizador'] == 'moderador' || $_SESSION['tipoutilizador'] == 'quoter'){
                echo "<a id='openinput' class='btn btn-circle btn-quotes'><img src='imgs/plus.svg'></a>";
            }
        ?>
        <!--  -->
        <!-- Formulário para inserção de quote -->
        <div id="inputquote">
            <!-- Overlay -->
            <div class="controllerposition">
                <!-- BOX -->
                <div class="postinput">
                    <a id="closeinput" class="btn btn-hide"><img src="imgs/close.png"></a><br>
                    <div>
                        <form action="includes/sendquotes.inc.php" method="POST" enctype="multipart/form-data">
                            <h3>Qual é a Quote?</h3>
                            <textarea rows='4' cols='36' name='contentquote' placeholder='Escreva aqui a Quote/Conteúdo da Imagem.' required></textarea>                          
                            <p>Autor da quote: <input type="text" name="authorquote" required></p>    
                            <p>Imagem: <input type="file" name="image" accept="image/*" required/></p>
                            <p>Categoria: 
                                <select name="category">
                                    <option value="Inspiração">Inspiração</option>
                                    <option value="Relações">Relações</option>
                                    <option value="Adolescência">Adolescência</option>
                                    <option value="Positividade">Positividade</option>
                                    <option value="Confiança">Confiança</option>
                                    <option value="Espiritual">Espiritual</option>
                                    <option value="Felicidade">Felicidade</option>
                                    <option value="Seguir em frente">Seguir em frente</option>
                                    <option value="Conselho">Conselho</option>
                                    <option value="Outro">Outro</option>
                                </select>
                            </p>
                            <input type="hidden" name='submit' value='submit'>
                            <input type="image" src="imgs/enviar.png" >
                        </form>
                    </div>
                </div><!-- End Box -->
            </div><!-- End Overlay  -->
        </div><!-- End Form Add Quote -->
    </div>
    <script type='text/javascript'>
    $('#openinput').on('click', function () {
      $('#inputquote').toggle();
    });
    $('#closeinput').on('click', function () {
      $('#inputquote').toggle();
    });
    $('.openoverlaydelete').on('click', function () {
         $('#overlaydelete').toggle();
    } );
    $('#closeoverlaydelete').on('click', function () {
         $('#overlaydelete').toggle();
    } );
    function deletequote(idquote){  
        var elemento =  document.getElementById('getdeletecontent');
            elemento.innerHTML = "";
            elemento.innerHTML = "<form action='includes/deletequotes.inc.php' method='POST'><input type='hidden' name='idquotes' value='"+ idquote +"'><input type='hidden' name='submitdelete' value='submit'><input type='image' class='size24' src='imgs/yes.png'></form>";
    }
    </script>
<?php
 include_once('footer.php');
?>