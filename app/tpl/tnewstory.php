<?php 

if(!empty($_SESSION['rol']))
{
    $rol = $_SESSION['rol'];
    $id = $_SESSION['iduser'];
}
else
{
    header('Location: /storypub/dashboard.php');
}
include 'header.php';
?>
<script type="text/javascript">
 $(function(){


});


</script>

<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="/storypub/dashboard">StoryPub</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="/storypub/dashboard">Panel de control</a></li>
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


<div id="container-fluid" class="cont_blanco2" style="width: 60%;justify-content: center; margin-left: 20%; margin-top: 3%;">
<h2>New Story</h2>
	<form id="nuevo" action="/storypub/newstory/add_story" method="POST" style="display: flex; justify-content: center; flex-wrap: wrap;">
		<div style="flex:1 1 100%;">
			<label>Titulo</label><br/>
			<input style="width:30%;" type="text" id="titulo" name="titulo">
		</div>
		<div style="flex:1 1 100%;">
			<label>Sinompsis</label>
			<input style="width:100%;" type="text" id="sinopsis" name="sinopsis">
		</div>
		<div style="flex:1 1 100%;justify-content: center;">
			<label>Historia</label>
			<p style="width:100%;"><textarea style="height: 300px;" id="historia" name="historia"></textarea></p>
		</div>
    <div style="flex:1 1 100%;">
      <label>Tags (Separados por comas)</label>
      <input style="width:100%;" type="text" id="tags" placeholder="Accion,Peleas,Infantil..." name="tags">
    </div>
		<button type="submit" id="enviar" style="margin-right: 50px;" class="btn btn-lg btn-default">Enviar</button>
	</form>
</div>

