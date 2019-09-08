<?php include('includes/header.php') ?>
<!-- main content -->
<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Songs U may liks</div>
          <div class="card-body">
            <div class="albums card-columns">
              <?php
              $albumsQuery = mysqli_query($con, 'SELECT * FROM albums ORDER BY RAND()');
              while ($row = mysqli_fetch_array($albumsQuery)) {
                echo  '<div class="card" style="width: 10rem;"><img src="' . $row['artPath'] . '" alt="" class="img-thumbnail "><div class="card-body p-2"><p class="card-text">' . $row['title'] . '</p></div></div>';
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