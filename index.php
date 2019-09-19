<?php include('includes/header.php') ?>
<!-- main content -->
<main class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-9 p-3">
        <!-- main header -->
        <div class="header mb-3 rounded mx-4">
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
          <div class="popular-song mb-2">
            <div class="card">
              <div class="card-header font-weight-bold">
                Popular Songs
              </div>
              <ul class="list-group list-group-flush shadow">
                <li class="list-group-item font-weight-bold rounded">
                  <img src="assets/img/music_girl.png" alt="album-pic" width="40px" class="rounded mr-2"> Bla blaaaaaaaaaaaaaaaaaaaaaaaaaa
                </li>
                <li class="list-group-item font-weight-bold rounded">
                  <img src="assets/img/music_girl.png" alt="album-pic" width="40px" class="rounded mr-2"> Bla bla
                </li>
                <li class="list-group-item font-weight-bold rounded">
                  <img src="assets/img/music_girl.png" alt="album-pic" width="40px" class="rounded mr-2"> Bla bla
                </li>
              </ul>
            </div>
          </div>
          <div class="recently-play mt-2">
            <div class="card">
              <div class="card-header font-weight-bold">
                Recently Plays
              </div>
              <ul class="list-group list-group-flush shadow">
                <li class="list-group-item font-weight-bold rounded">
                  <img src="assets/img/music_girl.png" alt="album-pic" width="40px" class="rounded mr-2"> Bla bla
                </li>
                <li class="list-group-item font-weight-bold rounded">
                  <img src="assets/img/music_girl.png" alt="album-pic" width="40px" class="rounded mr-2"> Bla bla
                </li>
                <li class="list-group-item font-weight-bold rounded">
                  <img src="assets/img/music_girl.png" alt="album-pic" width="40px" class="rounded mr-2"> Bla bla
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include('includes/footer.php') ?>