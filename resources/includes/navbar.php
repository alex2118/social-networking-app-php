<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Confessions</a></li>
      <li><a href="#">Hugot Lines</a></li>
      <li><a href="#">Travel</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">More
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">

      <?php

        if (isset($_SESSION['id'])) {
          ?>
          <li><a href="#">Create Post</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $username; ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Page 1-1</a></li>
              <li><a href="#">Page 1-2</a></li>
              <li><a href="../public/logout.php">Logout</a></li>
            </ul>
          </li>

          <?php
        } else {
          ?>

          <li><a href="#" data-toggle="modal" data-target="#modal">Login</a></li>

          <?php

        }

       ?>

    </ul>
  </div>
</nav>

<?php

  include('modal.php');

 ?>
