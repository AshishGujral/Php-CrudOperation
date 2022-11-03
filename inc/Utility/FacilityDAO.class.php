<?php
/*
+-------------+------------+------+-----+---------+----------------+
| Field       | Type       | Null | Key | Default | Extra          |
+-------------+------------+------+-----+---------+----------------+
| facility_id | tinyint(3) | NO   | PRI | NULL    | auto_increment |
| short_name  | char(5)    | YES  |     | NULL    |                |
| long_name   | tinytext   | YES  |     | NULL    |                |
+-------------+------------+------+-----+---------+----------------+
*/
class FacilityDAO  {

    //Static DB member to store the database
    private static $db;
    //Initialize the FacilityDAO
    static function initialize(string $className)    {
        self::$db= new PDOService($className);
        //Remember to send in the class name for this DAO
    }

    //Get all the Facility
    static function getFacility() {
        // SELECT        
        $selectAll = "SELECT * FROM facility";
        self::$db->query($selectAll);
        self::$db->execute();
        return self::$db->resultSet();
        //Prepare the Query
        
        //Return the resultSet
    }
}


?>