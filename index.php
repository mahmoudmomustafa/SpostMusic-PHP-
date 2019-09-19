<?php include('includes/header.php') ?>
<!-- main content -->
<main class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="header">
          <!-- <img src="assets/img/misc.gif" alt="head" class="w-100"> -->
        </div>
        <div class="card">
          <div class="card-header">Songs U may like</div>
          <div class="card-body">
            <div class="albums d-flex flex-wrap">
              <?php
              $albumsQuery = mysqli_query($con, 'SELECT * FROM albums ORDER BY RAND()');
              while ($row = mysqli_fetch_array($albumsQuery)) {
                echo '<div class="card mx-2 h-100 album" style="width: 10rem;"><a href="album.php?' . $row['id'] . '"><img src="' . $row['artPath'] . '" alt="" class="img-thumbnail" data-toggle="tooltip" data-placement="right" title="' . $row['title'] . '"></a><div class="card-body p-2 d-none"><p class="card-text">' . $row['title'] . '</p></div></div>';
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="container">
          <div class="popular-song">
            Popular Song..
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include('includes/footer.php') ?>