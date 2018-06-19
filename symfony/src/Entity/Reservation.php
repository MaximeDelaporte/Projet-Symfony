<?php // src/Entity/Reservation.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Reservation
{
    private $id;
    private $room; // instance of Room
    private $user; // instance of User
    private $options;//instance of Option
    private $createdAt;
    private $rentedDateBegin;
    private $rentedDateEnd;
    private $price;

    public function __construct(){
        $this->options = new ArrayCollection();
    }
    public function setCreatedAtValue(LifecycleEventArgs $event){
        $this->createdAt = new \DateTime();
    }
    public function setUpdatedAtValue(LifecycleEventArgs $event){
        $this->updatedAt = new \DateTime();
    }
}