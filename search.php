<?php include('includes/header.php');
if (isset($_GET['search'])) {
  $search = $_GET['search'];
} else {
  header('Location: index.php');
}
?>
<!-- main content -->
<main class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-9 p-3 mb-5">
        <!-- songs -->
        <div class="card mx-4 songs-may-like">
          <div class="card-header font-weight-bold pb-0">Tracks</div>
          <div class="card-body pt-2">
            <div class="albums d-flex flex-wrap">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Time</th>
                    <th scope="col">Plays</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $songsQuery = mysqli_query($con, "SELECT * FROM songs WHERE title LIKE '%$search%'");
                  if(mysqli_fetch_row($songsQuery) == 0){
                    echo 'Nothing Found';
                  }
                  $i = 0;
                  while ($row = mysqli_fetch_array($songsQuery)) {
                    $i++;
                    echo '<tr><th scope="row">' . $i . '<span onclick="setTrack(\'' . $row['id'] . '\', tempPlaylist, true)"><i class="lni-play"></i></span></th><th scope="row">' . $row['title'] . '</th><th scope="row">' . $row['duration'] . '</th><th scope="row" class="text-muted"><small>' . $row['plays'] . '<i class="lni-pulse ml-2"></i></small></th></tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- albums -->
        <div class="card mx-4 songs-may-like">
          <div class="card-header font-weight-bold ">Albums</div>
          <div class="card-body">
            <div class="albums d-flex flex-wrap">
              <?php
              $albumsQuery = mysqli_query($con, "SELECT * FROM albums WHERE title LIKE '%$search%'");
              if(mysqli_fetch_row($albumsQuery) == 0){
                echo 'Nothing Found';
              }
              while ($row = mysqli_fetch_array($albumsQuery)) {
                  echo '<div class="card position-relative mx-2 mb-3 h-100 album" style="width: 10rem;"><img src="' . $row['artPath'] . '" alt="" class="img-thumbnail" data-toggle="tooltip" data-placement="right" title="' . $row['title'] . '"><div class="card-body album-card p-2 d-none"><p class="card-text font-weight-bold"><a href="album.php?id=' . $row['id'] . '">' . $row['title'] . '</a></p></div></div>';
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include('includes/footer.php') ?>