<?php include('includes/header.php');
if (isset($_GET['id'])) {
  $albumId = $_GET['id'];
} else {
  header('Location: index.php');
}

$album = new Album($con, $albumId);
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
                <img src="<?php echo $album->artPath(); ?>" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $album->title(); ?></h5>
                  <p class="card-text"><?php echo $album->artist()->name(); ?></p>
                  <p class="card-text"><small class="text-muted"><?php echo $album->getNumberOfSong() ?> Songs</small></p>
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
                  $songs = $album->SongsId();
                  foreach ($songs as $song) {
                    $song = new Song($con, $song);
                    echo '<tr><th scope="row">' . $song->albumOrder() . '</th><th scope="row">' . $song->title() . '</th><th scope="row">' . $song->duration() . '</th><th scope="row" class="text-muted"><small>' . $song->plays() . '<i class="lni-pulse ml-2"></i></small></th></tr>';
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