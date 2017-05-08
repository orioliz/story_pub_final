<?php
    include 'header.php';
?>
<script>
    $(function(){
        
        $("#form_login").submit(function(event) { 
            event.preventDefault();
            var user = $("#user").val()
            var pass = $.md5($("#pass").val()); // md5 para cifrar SEGURIDAD ANTE TODO !

            $.post( "/storypub/login/login",{user:user,pass:pass}, function( data ) {
                    if(data==1)
                    {
                        window.location.href = "http://oizquierdo.cesnuria.com/storypub/dashboard";
                    }
                    else
                    {
                        alert(data);
                    }

            });
           
        });
        
    });
</script>
  <body>

    <nav class="navbar ">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/storypub/">StoryPub <span>Muchas historias que contar</span></a>         
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="/storypub/dashboard">Panel de control</a></li>
          <li><a href="/storypub/newstory">New Story</a></li>          
        </ul>
    </nav>

    <div class="container">
        <div class="panel-login">
            <form class="form-signin" method="POST" id="form_login">
                <h2 class="form-signin-heading">INICIAR SESIÓN</h2>
                <label for="inputtext" class="sr-only">Username</label>
                <input type="text" id="user" name="user" class="form-control" placeholder="Escriba su usuario..." required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Escriba su password..." required>
                <button class="btn btn-lg btn-success btn-block entrar" type="submit">ENTRAR </button>
                <a href="https://oizquierdo.cesnuria.com/storypub/registry"><button type="button" class="btn btn-lg login-otros">SOY NUEVO</button></a>
                <a href="#"><button type="button" class="btn btn-lg login-otros perdida">
                SOY UN DESASTRE, <br> HE PERDIDO LA CONTRASEÑA
                </button></a>
            </form>
                     
        </div>
    </div> 
  </body>
</html>

