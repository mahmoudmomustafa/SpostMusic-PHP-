<?php

class Album
{
  private $con;
  private $id;
  private $title;
  private $artist;
  private $genre;
  private $artPath;


  public function __construct($con, $id)
  {
    $this->con = $con;
    $this->id = $id;
    // get album query
    $query = mysqli_query($this->con, "SELECT * FROM albums WHERE id='$this->id'");
    $album = mysqli_fetch_array($query);
    $this->title = $album['title'];
    $this->artistId = $album['artist'];
    $this->genre = $album['genre'];
    $this->artPath = $album['artPath'];
  }
  public function title()
  {
    return $this->title;
  }
  public function genre()
  {
    return $this->genre;
  }
  public function artPath()
  {
    return $this->artPath;
  }
  public function artist()
  {
    return new Artist($this->con, $this->artist);
  }
  public function getNumberOfSong()
  {
    $query = mysqli_query($this->con, "SELECT id FROM songs WHERE album='$this->id'");
    return mysqli_num_rows($query);
  }
  public function SongsId()
  {
    $query = mysqli_query($this->con, "SELECT id FROM songs WHERE album='$this->id' ORDER BY albumOrder asc");
    $songs = array();
    while ($row = mysqli_fetch_array($query)) {
      array_push($songs, $row['id']);
    }
    return $songs;
  }
}
