<?php

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
class ReservationDAO  {

    //Static DB member to store the database    
    private static $db;
    //Initialize the ReservationDAO
    static function initialize(string $className)    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService($className);
    }

    // One of the functionality for the class abstracted by this DAO: CREATE
    // Remember that Create means INSERT
    static function createReservation(Reservation $newReservation) {

          $insert ="INSERT INTO reservation(reservation_id, full_name, email, facility_id, date, length)
                    VALUES (:id, :fullname, :email, :facility_id, :date, :length)";

        // prepare the statment
        self::$db->query($insert);
        // bind the parameters
        self::$db->bind(':id',$newReservation->getreservation_id());
        self::$db->bind(':fullname',$newReservation->getfull_name());
        self::$db->bind(':email',$newReservation->getemail());
        self::$db->bind(':facility_id',$newReservation->getfacility_id());
        self::$db->bind(':date',$newReservation->getdate());
        self::$db->bind(':length',$newReservation->getlength());
        // QUERY BIND EXECUTE 
        self::$db->execute();
        // You may want to return the last inserted id
        return self::$db->lastInsertedId();

    }
    
    // GET = READ = SELECT
    // This is for a single result.... when do I need it huh?
    static function getReservation(string $ReservationId)  {
        
        //QUERY, BIND, EXECUTE, RETURN (the single result)
        $selectOne = "SELECT * FROM reservation where reservation_id=:ReservationId";
        self::$db->query($selectOne);
        self::$db->bind('ReservationId',$ReservationId);
        self::$db->execute();
        return self::$db->singleResult();

    }

    // GET = READ = SELECT ALLL
    // This is to get all students, do I even need this function?
    static function getReservations() {
        $selectAll = "SELECT * FROM reservation";
        self::$db->query($selectAll);
        self::$db->execute();
        return self::$db->resultSet();
        // I don't need any parameter here, do I need to bind?

        
        //Prepare the Query
        //execute the query
        //Return results
    }
    
    // UPDATE means update
    static function updateReservation (Reservation $ReservationToUpdate) {
        $upd= "UPDATE reservation set full_name =:fullname, email=:email ,facility_id=:facility_id,date=:date,length=:length
        where reservation_id=:reservation_id";
        self::$db->query($upd); 
        self::$db->bind(':reservation_id',$ReservationToUpdate->reservation_id);
        self::$db->bind(':fullname',$ReservationToUpdate->full_name);
        self::$db->bind(':email',$ReservationToUpdate->email);
        self::$db->bind(':facility_id',$ReservationToUpdate->facility_id);
        self::$db->bind(':date',$ReservationToUpdate->date);
        self::$db->bind(':length',$ReservationToUpdate->length);
        self::$db->execute();
        return self::$db->rowCount();
       
    
        // QUERY, BIND, EXECUTE
        // You may want to return the rowCount

    }
    
    // Sorry, I need to DELETE your record
    static function deleteReservation(string $ReservationId) {

        // Yea...yea... it is a drill like the one before  
        $del = "DELETE FROM reservation where reservation_id=:res_id";
        try{
            self::$db->query($del);
            self::$db->bind('res_id',$ReservationId);
            self::$db->execute();
            if(self::$db->rowCount()!= 1){
                throw new PDOException("Problem deleting Reservation $ReservationId");
            }
        }
        catch(PDOException $e){
            //self::$db->debugDumpParams();
            return false;
        }
        return true;

    }

    // WE NEED TO USE JOIN HERE
    // Make sure to select from both tables joined at the correct column
    static function getReservationList() {
        $join = "SELECT t1.long_name from facility as t1, reservation as t2
                Where t1.facility_id= t2.facility_id";
                
        //Prepare the Query
        //execute the query
        //Return row results
        self::$db->query($join);
        self::$db->execute();
        return self::$db->resultSet();
        
    }

}


?>