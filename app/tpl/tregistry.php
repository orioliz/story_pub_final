<?php
    include 'header.php';
?>
<script>
var long="";
var alt="";
getLocation();
    $(function(){
       
        $("#email").focusout(function()
        { email=$("#email").val();
            $.post( "/storypub/registry/check_email",{ email: email}, function( data ) {
               $("#error_email").text(data);
            });
        });
        
        $("#user").focusout(function()
        { user=$("#user").val();
            $.post( "/storypub/registry/check_user",{ user: user}, function( data ) {
               $("#error_user").text(data);
            });
        });
        
        $("#form_registry").submit(function(event)
        { 
            event.preventDefault();
            var user = $("#user").val();
            var email = $("#email").val();
            var pass = $.md5($("#pass").val());            

            if($("#error_email").text()=="" && $("#error_user").text()=="")
            {
                $.post( "/storypub/registry/registry",{email:email,user:user,pass:pass,latitud:latitud,altitud:altitud}, function( data ) {
                    if(data==1)
                    {
                        window.location.href = "https://oizquierdo.cesnuria.com/storypub/login";
                    }
                    else
                    {
                        alert(data);
                    }

                 }); 
            }
           
        });       
    });

getLocation();

function getLocation() {
    if (navigator.geolocation) {
        return navigator.geolocation.getCurrentPosition(showPosition);

    } else { 
        return 0;
    }
}


</script>
  <body>

   <nav class="navbar">
      <div class="container-fluid">
        <div class="navbar-header">          
          <a class="navbar-brand" href="/storypub/home">StoryPub <span>Muchas historias que contar</span></a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="/storypub/dashboard">Panel de control</a></li>
          <li><a href="/storypub/newstory">New Story</a></li>          
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/storypub/registry"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
          <li><a href="/storypub/login"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesion</a></li>         
        </ul>
      </div>
</nav>


    <div class="container">
        <div class="panel-login">
        <form class="form-signin" method="POST" id="form_registry">
            <h2 class="form-signin-heading">REGISTRARSE</h2>
            <label for="inputPassword" class="sr-only">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
            <span id="error_email"></span>
            <label for="inputtext" class="sr-only">Username</label>
            <input type="text" id="user" name="user" class="form-control" placeholder="User" required>
            <span id="error_user"></span>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>
            <span id="error_pass"></span>     
        
        
        <button id="enviar" class="btn btn-lg btn-success btn-block entrar" type="submit">Enviar</button>
       </form>
        <a href="https://oizquierdo.cesnuria.com/storypub/login"><button type="button" class="btn btn-lg login-otros">Login</button></a>
          <a href="https://oizquierdo.cesnuria.com/storypub/dashboard"><button type="button" class="btn btn-lg login-otros">Guest</button></a>
        </div>
    </div> 
  </body>
</html>


