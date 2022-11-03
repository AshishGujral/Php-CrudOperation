<?php

Class Facility    {
    
    // Make sure to have attributes and get only the fields we need here
    // Save your time :)
  /*
+-------------+------------+--------------+
| facility_id | short_name | long_name    |
+-------------+------------+--------------+
|           1 | MR         | Meeting Room |
|           2 | SR         | Seminar Room |
|           3 | HR         | Hitech Room  |
|           4 | GC         | Gymanstic    |
|           5 | AM         | Auditorium   |
+-------------+------------+--------------+ */
    //Attributes
    private $facility_id;
    private $long_name;

     //Getters
     function getfacility_id(): int{
        return $this->facility_id;
    }
    function getlong_name(): string{
        return $this->long_name;
    }

    //Setters
    function setfacility_id(int $id){
        $this->facility_id = $id;
    }
    function setlong_name(string $name){
        $this->long_name = $name;
    }
}

?>