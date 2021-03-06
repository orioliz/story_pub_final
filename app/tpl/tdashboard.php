<?php
if(!empty($_SESSION['rol']))
{
    $rol = $_SESSION['rol'];
    $id = $_SESSION['iduser'];
}
else
{
    $rol = 0;
    $id = 0;
}

include 'header.php';
?>
<script type="text/javascript">
  $(function(){
    $(".propias").css("display","none");
    $("#mis").on("click", function(){
        $(".propias").css("display","block");
        $(".todas").css("display","none");
    });
    $("#todas").on("click", function(){
        $(".propias").css("display","none");
        $(".todas").css("display","block");
    });
  });
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
          <li><a href="/storypub/registry"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
          <li><a href="/storypub/login"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesion</a></li>
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
  <div id="container-fluid">
   
    <div class="cont_blanco2">
    <h2>HISTORIAS</h2>
      <div class="lista_historias">
        <div class="todas">
          <?php
            foreach ($this->dataTable['all_stories'] as $historia) {
            ?>
              <div class="historia">
                <a class="datos" href="/storypub/storyview/load/id/<?=$historia['idstories']?>">
                <div class="media">
                <span class="punt">Puntuacion</span>
                <?=$historia['medium_value']?>
                </div>
                <div class="h_cont"><p><strong><?=$historia['title']?></strong></p><?=$historia['sinopsis']?></div>
                </a>
                <?php
                if($rol==1 || $id == $historia['users'])
                {
                ?>
                <div class="acciones">
                  <a href="/storypub/editstory/load/id/<?=$historia['idstories']?>">
                  <div>Editar</div>
                  </a>
                  <a href="/storypub/dashboard/delete/id/<?=$historia['idstories']?>">
                  <div>Borrar</div>
                  </a> 
                </div>
                <?php
                }
                ?>
              </div>
          <?php
            }
          ?>
          
        </table></div>
        <dir class="propias">
          <?php
          if(!empty($this->dataTable['my_stories']))
          {
            foreach ($this->dataTable['my_stories'] as $historia) {
            ?>
              <div class="historia">
                <a class="datos" href="/storypub/storyview/load/id/<?=$historia['idstories']?>">
                <div class="media">
                   <span>Puntuacion</span>
                    <?=$historia['medium_value']?>
                </div>
                <div class="h_cont"><p><strong><?=$historia['title']?></strong></p><?=$historia['sinopsis']?></div>
                </a>
                <div class="acciones">
                  <a href="/storypub/editstory/load/id/<?=$historia['idstories']?>">
                  <div>Editar</div>
                  </a>
                  <a href="/storypub/dashboard/delete/id/<?=$historia['idstories']?>">
                  <div>Borrar</div>
                  </a> 
                </div>
              </div>
          <?php
            }
          }
          else
          {
          ?>
          <div style="width: 100%;">
            <div style="padding: 10px;">No tienes ninguna historia. Crea una !</div>
            <div style="padding: 10px;">Crear historia.</div>
           </div>
          <?php
          }
          ?> 
        </dir>
      </div>
      <div class="nums">
          <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Primera</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Ultima</a></li>
              </ul>
         </nav>
      </div>
    </div>
  </div>
</body>