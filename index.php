<?php
    include_once('header.php');
    include_once('includes/functions.inc.php');
?>        
<!--Full page content-->
    <div class="background-index">
        <div class="wrapper">
        <?php echo displayErrors(); ?>
            <div class="mainquotebox">
                <div class="mainquote">
                    <h2>We accept the love we think we deserve.</h2>
                    <p>- Stephen Chbosky</p>
                </div>
                <a href="#" class="btn-arrowdown"><img src='imgs/downarrow.png'></a>
            </div>
        </div>
    </div>  
    <div class="wrapperx">
        <!--  -->
        <!-- POSTING -->
        <div class='indexcontainer'>
            <div class="whatisposting">     
                <h2>Posting</h2>
                <p> Posting é uma parte do nosso website que permite que escrevas aquilo que sentes de forma totalmente <b>Anónima</b>.<br>
                <sub>Caso pretendas podes fazê-lo sem ser anónimo, para isso terás que criar uma conta <a href="register.php"><b>aqui</b></a>.<sub></p>
                <br>
                <a href="feed.php" class='btn btn-rounded'>Exprimenta Já</a>
            </div>
            <div class="postsquote">     
                <h1>Maneiras antigas não abrem portas novas.</h1>
            </div>
            <div class='lastestposts'>
                <a href="feed.php"><h3>Últimos Posts</h3></a>
                <hr>
                <a href="#AtualizarPosts" class='reload' onclick='reloadpostsindex();'><img src='imgs/recarregar.png' class='img-center size24'></a>
                <div class="lastestposts-box">
                    <div class="postzone postzoneindex" id='lastestposti'>
                        <?php include_once('includes/lastestpostsindex.inc.php'); ?>
                    </div>
                </div>        
            </div>
        </div>
        <hr>
        <!--  -->
        <!-- QUOTES -->
        <div class='indexcontainer'>
            <div class="whatisquotes">     
                <h2>Quotes</h2>
                <p>Todos nós, em algum momento precisamos de ajuda, nada melhor que uma imagem.</p>
                <br>
                <a href="quotes.php" class='btn btn-rounded'>Vê aqui</a>
            </div>
            <div class="quotesquote">     
                <h1>A vida é uma viagem, aproveita.</h1>
            </div>
            <div class='lastestquotes'>
                <a href="quotes.php"><h3>Últimas Quotes</h3></a>
                <hr>
                <a href="#AtualizarQuotes" class='reload' onclick='reloadquotesindex();'><img src='imgs/recarregar.png' class='img-center size24'></a>
                <div class="lastestposts-box">
                    <div class="postzone postzoneindex" id='lastestquotesi'>
                        <?php include_once('includes/lastestquotesindex.inc.php'); ?>
                    </div>
                </div>        
            </div>
        </div>
        <hr>
        <!--  -->
        <!-- VIDEOS -->
        <div class='indexcontainer'>
            <div class="whatiscoaching">   
                <h2>Coaching</h2>  
                <p>Ao vermos vídeos de Coaching estamos a ajudar-nos e nunca sabemos quando vamos poder ajudar o próximo.</p>
                <br>
                <a href="coaching.php" class='btn btn-rounded'>Escolhe o teu vídeo aqui</a>
            </div>
            <br>
            <div class="coachingquote">     
                <h1>I'm crazy, I'm nuts. Just the way my brain works. I'm not normal. I think differently.</h1>
            </div>
        </div>
        <hr>
    </div>
    
<?php include_once('footer.php'); ?>