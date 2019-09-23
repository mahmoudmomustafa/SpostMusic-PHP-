<?php include('includes/header.php');
if (isset($_GET['id'])) {
  $artistId = $_GET['id'];
} else {
  header('Location: index.php');
}
$artist = new Artist($con, $artistId);
?>
<!-- main content -->
<main class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-9 p-3 mb-5">
        <!-- album -->
        <div class="album mx-4">
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $artist->name(); ?></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
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
                  $albumsQuery = mysqli_query($con, "SELECT * FROM songs WHERE artist='$artistId' ORDER BY plays desc LIMIT 4");
                  $i = 0;
                  while ($row = mysqli_fetch_array($albumsQuery)) {
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
              $albumsQuery = mysqli_query($con, "SELECT * FROM albums WHERE artist='$artistId'");;
              while ($row = mysqli_fetch_array($albumsQuery)) {
                  echo '<div class="card position-relative mx-2 mb-3 h-100 album" style="width: 10rem;"><img src="' . $row['artPath'] . '" alt="" class="img-thumbnail" data-toggle="tooltip" data-placement="right" title="' . $row['title'] . '"><div class="card-body album-card p-2 d-none"><p class="card-text font-weight-bold"><a href="album.php?id=' . $row['id'] . '">' . $row['title'] . '</a></p></div></div>';
              }
              ?>
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
  <script>
    var tempSongIds = '<?php echo json_encode($songs); ?>';
    console.log(tempSongIds);
    tempPlaylist = JSON.parse(tempSongIds);
  </script>
</main>
<?php include('includes/footer.php') ?>