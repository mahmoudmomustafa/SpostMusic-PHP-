<nav class="navbar navbar-expand-lg">
  <div class="container">
    <!-- nav side -->
    <ul class="nav mr-auto">
      <li class="nav-item">
        <form action="search.php" method="get">
          <div class="form-group mb-0 position-relative">
            <label for="search" class="position-absolute search-icon">@</label>
            <input type="search" name="search" id="search" class="form-control search-input" placeholder="Search songs, albums and artists ...">
          </div>
        </form>
      </li>
    </ul>
    <div class="right-div" id="right-nav">
      <ul class="nav ml-auto justify-content-end">
        <li class="nav-item">
          <a class="nav-link text-secondary" href="/projects/SpotMusic/profile.php"><?php echo $userLogged ?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>