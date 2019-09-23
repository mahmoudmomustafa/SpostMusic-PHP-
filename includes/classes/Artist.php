<?php
class Artist
{
  private $con;
  private $id;
  private $name;

  public function __construct($con, $id)
  {
    $this->con = $con;
    $this->id = $id;

    $query = mysqli_query($this->con, "SELECT name FROM artists WHERE id='$this->id'");
    $artist = mysqli_fetch_array($query);

    $this->name = $artist['name'];
  }

  public function name()
  {
    return $this->name;
  }
}
