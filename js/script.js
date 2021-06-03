/* Função para fechar a caixa de erros. */
function closeerrorbox(){
    document.getElementById('box-error').style.display='none';
}

function autoCloseErrorBox(){
    setTimeout(closeerrorbox, 10000);
}

function checkpeopleonline(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('onlinepeople').innerHTML = this.responseText;
            };
        };
    xhttp.open("GET", "includes/getpeopleonline.inc.php", true);
    xhttp.send();
}

function autopeopleonline(){
    setTimeout(checkpeopleonline, 10000);
}

function closeoverlay(){
    document.getElementById('overlaymenu').style.display='none';
    document.getElementById('overlaydelete').style.display='none';
}

/* Administração função de carregar e fechar dados */
function loaddatauser(user, typeuser, avatar, status){
    document.getElementById('usertochange').value = user;
    document.getElementById('usertodelete').value = user;
    document.getElementById('avatartoset').src = 'imgs/avatar/'+avatar;
    document.getElementById('selecteduser').innerHTML = user;
    document.getElementById('whattheuser').value = typeuser;
    document.getElementById('selectedusertypeuser').innerHTML = typeuser;
    if(status == 'deactivated'){
        document.getElementById('deletebtn').style.display = 'block';
        document.getElementById('deletebtn').style.background = 'green';
        document.getElementById('deletebtn').innerHTML = 'Ativar conta';
        document.deletionactivate.action = 'includes/activateuseradmin.inc.php';
    }else{
        document.getElementById('deletebtn').style.background = 'red';
        document.getElementById('deletebtn').innerHTML = 'Desativar conta';
        document.getElementById('deletebtn').style.display = 'block';
        document.deletionactivate.action = 'includes/deactivateuseradmin.inc.php';
    }
}

function closeloaddatauser(){
    document.getElementById('usertochange').value = '';
    document.getElementById('usertodelete').value = '';
    document.getElementById('avatartoset').src = 'imgs/avatar/defaultuser.png';
    document.getElementById('selecteduser').innerHTML = 'Selecione um utilizador';
    document.getElementById('selectedusertypeuser').innerHTML = '';
    document.getElementById('deletebtn').style.display = 'none';
}

function loadFormwithdata(username,email,datanasc){
    document.getElementById('btnAlterarDados').style.display = 'none';
    document.getElementById('useremail').innerHTML = "<input type='email' name='newemail' value="+email+" maxlength='64'>";
    document.getElementById('usernewpwd').innerHTML = '<input type="password" name="newpwd" placeholder="Nova password" maxlength="32" pattern="{6,32}" title="Must contain between 6 and 32 characters">';
    document.getElementById('usernewpwd2').innerHTML = '<input type="password" name="newpwdverify" placeholder="Verificar Nova password" maxlength="32" pattern="{6,32}" title="Must contain between 6 and 32 characters">' ;
    document.getElementById('targetNewLi').innerHTML += "<li>Password Atual:</li>";
    document.getElementById('targetNewLi').innerHTML += "<li><a href='utilizador.php'>Retroceder</a></li>";
    document.getElementById('targetForm').innerHTML += '<li><input type="password" name="atualpwd" placeholder="Password atual" maxlength="32" pattern="{6,32}" title="Must contain between 6 and 32 characters"></li><li><input class="btn btn-rounded" type="submit" name="submit" value="Enviar dados"></li>';
}

// INDEX POSTS Reload
function autoReloadindex(){
    setInterval(reloadpostsindex, 30000);
    setInterval(reloadquotesindex, 30000);
}

function reloadpostsindex(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('lastestposti').innerHTML = this.responseText;
            };
        };
    xhttp.open("GET", "includes/lastestpostsindex.inc.php", true);
    xhttp.send();
}
function reloadquotesindex(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('lastestquotesi').innerHTML = this.responseText;
            };
        };
    xhttp.open("GET", "includes/lastestquotesindex.inc.php", true);
    xhttp.send();
}

// ADMIN USER Reload
function autoReloadadmin(){
    setInterval(reloaduser, 120000);
    setInterval(reloadposts, 120000);
    setInterval(reloadquotes, 120000);
}

function reloaduser(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('reloadusers').innerHTML = this.responseText;
            };
        };
    xhttp.open("GET", "includes/loadusers.inc.php", true);
    xhttp.send();
}

// ADMIN POSTS Reload
function reloadposts(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('latestposts').innerHTML = this.responseText;
            };
        };
    xhttp.open("GET", "includes/lastestposts.inc.php", true);
    xhttp.send();
}

// ADMIN QUOTES Reload
function reloadquotes(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('latestquotes').innerHTML = this.responseText;
            };
        };
    xhttp.open("GET", "includes/lastestquotes.inc.php", true);
    xhttp.send();
}
