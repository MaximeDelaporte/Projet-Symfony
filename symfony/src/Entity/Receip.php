<?php // src/Entity/Receip.php

namespace App\Entity;

class Receip {
  private $id;
  private $creationDate;
  private $value;
  @OneToOne(targetEntity="Room", mappedBy="id")
  private $room; //instance of Room
  @OneToOne(targetEntity="User", mappedBy="id")
  private $user; //instance of User
}
