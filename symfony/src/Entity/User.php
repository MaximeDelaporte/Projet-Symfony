<?php // src/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class User {
  private $id;
  private $surname;
  private $lastname;
  private $email;
  private $password;
  private $bankAccount;
  private $rentedRoom; // instance of Room
  private $receips; // instance of Receip

  public function __construct(){
    $this->receips = new ArrayCollection();
  }
}