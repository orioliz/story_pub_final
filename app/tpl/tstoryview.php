<?php 
if(!empty($_SESSION['rol']))
{
    $rol = $_SESSION['rol'];
    $id = $_SESSION['iduser'];
}
else
{
    header('Location: /sotrypub/dashboard');
}
include 'header.php';
?>

<script type="text/javascript">  
  $(function(){
    $(".deltag").on("click", function(){
      tag = $(this).find('span').text();
      $.post("/storypub/storyview/deletetag/tag/"+tag);
      location.reload(true);
    });
  });
</script>

<style>
    
        #form {
  width: 250px;
  margin: 0 auto;
  height: 50px;
}

#form p {
  text-align: center;
}

#form label {
  font-size: 20px;
}

input[type="radio"] {
  display: none;
}

label {
  color: grey;
}

.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}

label:hover,
label:hover ~ label {
  color: orange;
}

input[type="radio"]:checked ~ label {
  color: orange;
}
    

    .vista{
    width: 60%;
    justify-content: center; 
    margin-left: 20%; 
    margin-top: 3%; 
    background-color: white; 
    padding: 20px; 
    border-radius: 10px; 
}    
    
    
    
</style>

<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="/storypub/dashboard">StoryPub</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="/storypub/dashboard">Home</a></li>
          <li><a href="/storypub/newstory">New Story</a></li>
          <?php
            if($rol==1)
            {
          ?>
            <li><a href="/storypub/users">Users</a></li>
          <?php
            }
          ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
  <?php
  if($rol==0)
  {
  ?>
          <li><a href="/storypub/registry"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="/storypub/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
  <?php
  }
  else if($rol!=0)
  {
  ?>
          <li><a href="/storypub/profile"><span class=""></span><?=$_SESSION['user'];?></a></li>
          <li><a href="/storypub/dashboard/logout"><span class=""></span>Logout</a></li>
  <?php
  }
  ?>
        </ul>
      </div>
</nav>

<div id="container-fluid" class="vista">
    <div style="flex:1 1 100%;">
    <div style="font-size: 50px";>
     <?php
     echo $this->dataTable['story'][0]['title'];
     ?> 
     </div>
    </div>
    <div style="flex:1 1 100%;font-size: 30px">
     <?php
     echo $this->dataTable['story'][0]['sinopsis'];
     ?> 
    </div>
    <div style="flex:1 1 100%;justify-content: center; padding-top: 30px;">
    <?php
       include (DATA.$this->dataTable['users'][0]['username'].DS.$this->dataTable['story'][0]['path'].'.txt');
    ?>
    </div>
   
    <div id="vloraciones">
      <div id="numeros" style="font-size: 50px; display: flex;">
      <div>Valoracion:</div>
        <form>
              <p class="clasificacion">
                <input id="radio1" type="radio" name="estrellas" value="5">
                <label for="radio1">★</label>
                <input id="radio2" type="radio" name="estrellas" value="4">
                <label for="radio2">★</label>
                <input id="radio3" type="radio" name="estrellas" value="3">
                <label for="radio3">★</label>
                <input id="radio4" type="radio" name="estrellas" value="2">
                <label for="radio4">★</label>
                <input id="radio5" type="radio" name="estrellas" value="1">
                <label for="radio5">★</label>
              </p>
            </form>
      </div>
    </div>
  
    
    
</div>