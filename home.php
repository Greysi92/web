<?php include('header.php'); ?>    
<?php include('session.php'); ?>    

<body>
  <!-- Barra de navegación superior -->
  <?php include('navbar.php'); ?>
  
  <div class="container-fluid">
    <div class="row">
      <!-- Barra lateral izquierda -->
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <i class="bi bi-house-door"></i> Inicio
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="bi bi-person"></i> Perfil
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="bi bi-gear"></i> Configuración
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Contenido principal -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <!-- Heading -->
        <div id="masthead" class="bg-light py-4 mb-4">  
          <div class="container">
            <?php include('heading.php'); ?>
          </div>
        </div>

        <!-- Feed de publicaciones -->
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10"> 
              <!-- Publicaciones -->
              <div class="panel">
                <div class="panel-body">
                  <div class="row">    
                    <?php
                      $query = $conn->query("SELECT * FROM post LEFT JOIN members ON members.member_id = post.member_id ORDER BY post_id DESC");
                      while ($row = $query->fetch()) {
                        $posted_by = $row['firstname'] . " " . $row['lastname'];
                        $posted_image = $row['image'];
                        $id = $row['post_id'];
                    ?>
                    <!-- Publicación individual -->
                    <div class="card mb-4 shadow-sm">
                      <div class="card-body">
                        <div class="row g-2">
                          <div class="col-md-2 col-sm-3 text-center">
                            <img src="<?php echo $posted_image; ?>" class="img-fluid rounded-circle shadow" style="width:100px;height:100px;" alt="Foto de perfil">
                          </div>
                          <div class="col-md-10 col-sm-9">
                            <div class="d-flex justify-content-between">
                              <h5 class="card-title mb-1"><?php echo $posted_by; ?></h5>
                              <span class="badge bg-info text-dark"><?php echo $row['date_posted']; ?></span>
                            </div>
                            <p class="card-text"><?php echo $row['content']; ?></p>
                            <div class="d-flex justify-content-end">
                              <a href="delete_post.php<?php echo '?id=' . $id; ?>" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Borrar
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Fin publicación individual -->
                    <?php } ?>
                  </div>
                </div>
              </div>
              <!-- Fin panel -->
            </div>
          </div>
        </div>

        <!-- Pie de página -->
        <?php include('footer.php'); ?>
      </main>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
