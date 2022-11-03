<?php

class Reservation {

/*
+----------------+-------------+------+-----+---------+-------+
| Field          | Type        | Null | Key | Default | Extra |
+----------------+-------------+------+-----+---------+-------+
| reservation_id | varchar(50) | YES  |     | NULL    |       |
| full_name      | varchar(50) | YES  |     | NULL    |       |
| email          | varchar(50) | YES  |     | NULL    |       |
| facility_id    | int(11)     | YES  |     | NULL    |       |
| date           | date        | YES  |     | NULL    |       |
| length         | int(11)     | YES  |     | NULL    |       |
+----------------+-------------+------+-----+---------+-------+

*/
public $reservation_id;
public $full_name;
public $email;
public $facility_id;
public $date;
public $length;

    // We need all columns 

    // Attributes, make sure they match the column names!    

    //Setters
    

    //Getters  
    function getreservation_id(): string{
        return $this->reservation_id;
    }
    function getfull_name(): string{
        return $this->full_name;
    }
    function getemail(): string{
        return $this->email;
    }
    function getfacility_id(): int{
        return $this->facility_id;
    }
    function getdate(): string{
        return $this->date;
    }
    function getlength(): int{
        return $this->length;
    }
    //Setters
    function setreservation_id(string $id){
        $this->reservation_id = $id;
    }
    function setfull_name(string $fullname){
        $this->full_name = $fullname;
    }
    function setemail(string $e){
        $this->email = $e;
    }
    function setfacility_id(int $f){
        $this->facility_id = $f;
    }
    function setdate(string $d){
        $this->date = $d;
    }
    function setlength(int $len){
        $this->length = $len;
    }
}