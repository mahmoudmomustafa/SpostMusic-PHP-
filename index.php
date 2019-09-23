<?php include('includes/header.php') ?>
<!-- main content -->
<main class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-9 p-3 mb-5">
        <!-- main header -->
        <div class="header mb-3 rounded mx-4">
        </div>
        <!-- recommended albums -->
        <div class="card mx-4 songs-may-like">
          <div class="card-header font-weight-bold ">Recommended Albums ..</div>
          <div class="card-body">
            <div class="albums d-flex flex-wrap">
              <?php
              $albumsQuery = mysqli_query($con, 'SELECT * FROM albums ORDER BY RAND() LIMIT 4');
              while ($row = mysqli_fetch_array($albumsQuery)) {
                $artistID = $row['artist'];
                $artist = mysqli_query($con, "SELECT name FROM artists WHERE id='$artistID'");
                while ($artistRow = mysqli_fetch_array($artist)) {
                  echo '<div class="card position-relative mx-2 mb-3 h-100 album" style="width: 10rem;"><img src="' . $row['artPath'] . '" alt="" class="img-thumbnail" data-toggle="tooltip" data-placement="right" title="' . $row['title'] . '"><div class="card-body album-card p-2 d-none"><p class="card-text font-weight-bold"><a href="album.php?id=' . $row['id'] . '">' . $row['title'] . '<span class="d-block text-center text-muted">' . $artistRow['name'] . '</span></a></p></div></div>';
                }
              }
              ?>
            </div>
          </div>
        </div>
        <!-- new songs -->
        <div class="card mx-4 songs-may-like">
          <div class="card-header font-weight-bold pb-0">Top Tracks</div>
          <div class="card-body pt-2">
            <div class="albums d-flex flex-wrap">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">Title</th>
                    <th scope="col">Album</th>
                    <th scope="col">Time</th>
                    <th scope="col">Plays</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $songsQuery = mysqli_query($con, 'SELECT * FROM songs ORDER BY plays desc LIMIT 5');
                  $i = 0;
                  while ($row = mysqli_fetch_array($songsQuery)) {
                    $i++;
                    $artistID = $row['artist'];
                    $artist = mysqli_query($con, "SELECT * FROM artists WHERE id='$artistID'");
                    while ($artistRow = mysqli_fetch_array($artist)) {
                      $albumID = $row['album'];
                      $album = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumID'");
                      while ($albumRow = mysqli_fetch_array($album)) {
                        echo '<tr><th scope="row">'.$i.'</th><th><img src="' . $albumRow['artPath'] . '" class="rounded" width="30px" data-toggle="tooltip" data-placement="right" title="' . $row['title'] . '"></th><th scope="row">'.$row['title'].'<span class="text-muted ml-2">'.$artistRow['name'].'</span></th><th scope="row">'.$albumRow['title'].'</th><th scope="row">'.$row['duration'].'</th><th scope="row">'.$row['plays'].'</th></tr>';
                      }
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- sidebar -->
      <div class="col-md-3">
        <div class="container">
          <div class="popular-song mb-2">
            <div class="card">
              <div class="card-header font-weight-bold">
                Recently Added
              </div>
              <ul class="list-group list-group-flush ">
                <?php
                $songsQuery = mysqli_query($con, 'SELECT * FROM songs ORDER BY added_at desc LIMIT 6');
                while ($row = mysqli_fetch_array($songsQuery)) {
                  $artistID = $row['artist'];
                  $artist = mysqli_query($con, "SELECT name FROM artists WHERE id='$artistID'");
                  while ($artistRow = mysqli_fetch_array($artist)) {
                    echo '<li class="list-group-item font-weight-bold"><span class="float-left"><i class="fas fa-play mr-2"></i>' . $row['title'] . '<small> - ' . $artistRow['name'] . '</small></span><span class="float-right">' . $row['plays'] . 'P</span></li>';
                  }
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include('includes/footer.php') ?>