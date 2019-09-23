<?php

class Song
{
  private $con;
  private $id;
  private $title;
  private $artist;
  private $album;
  private $duration;
  private $path;
  private $genre;
  private $albumOrder;
  private $plays;
  private $addedAt;

  public function __construct($con, $id)
  {
    $this->con = $con;
    $this->id = $id;
    // get songs query
    $query = mysqli_query($this->con, "SELECT * FROM songs WHERE id='$this->id'");
    $song = mysqli_fetch_array($query);

    $this->title = $song['title'];
    $this->artist = $song['artist'];
    $this->album = $song['album'];
    $this->duration = $song['duration'];
    $this->albumOrder = $song['albumOrder'];
    $this->path = $song['path'];
    $this->plays = $song['plays'];
    $this->addedAt = $song['added_at'];
  }
  public function id()
  {
    return $this->id;
  }
  public function title()
  {
    return $this->title;
  }
  public function artist()
  {
    return new Artist($this->con, $this->artist);
  }
  public function album()
  {
    return new Album($this->con, $this->album);
  }
  public function duration()
  {
    return $this->duration;
  }
  public function albumOrder()
  {
    return $this->albumOrder;
  }
  public function genre()
  {
    return $this->genre;
  }
  public function path()
  {
    return $this->path;
  }
  public function plays()
  {
    return $this->plays;
  }
  public function addedAt()
  {
    return $this->addedAt;
  }
}
