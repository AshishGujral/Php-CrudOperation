<?php

// Please rename me according to the naming convention

// require the config
require_once('inc/config.inc.php');
// require all the entities
require_once('inc/Entity/Facility.class.php');
require_once('inc/Entity/Page.class.php');
require_once('inc/Entity/Reservation.class.php');
// require all the utilities: PDO and DAO(s)
require_once('inc/Utility/FacilityDAO.class.php');
require_once('inc/Utility/PDOService.class.php');
require_once('inc/Utility/ReservationDAO.class.php');
//Initialize the DAO(s)
FacilityDAO::initialize("Facility");
ReservationDAO::initialize("Reservation");
$nd= new Reservation();
$fc= new Facility();
//If there was post data from an edit form then process it
if (!empty($_POST)) {
    // if it is an edit (remember the hidden input)

        //Assemble the Reservation record to update        
        
        //Send the Reservation record to the DAO to be updated
        // check if it is an edit 
        if(isset($_POST['edit']))
        {
            // update all the data 
            $nd->setreservation_id($_POST['id']);
            $nd->setfull_name($_POST['fullName']);
            $nd->setemail($_POST['email']);
            if($_POST['facID']=='Meeting Room')
            {
                $nd->setfacility_id(1);
            }
            else if($_POST['facID']=='Seminar Room'){
                $nd->setfacility_id(2);
            }
            else if($_POST['facID']=='Hitech Room'){
                $nd->setfacility_id(3);
            }
            else if($_POST['facID']=='Gymanstic'){
                $nd->setfacility_id(4);
            }
            else if($_POST['facID']=='Auditorium'){
                $nd->setfacility_id(5);
            }
         
            $nd->setdate($_POST['date']);
            $nd->setlength($_POST['length']);
            // call the updateReservation to update into database
            ReservationDAO::updateReservation($nd);
            
            // it is not an edit... it means create a new record
        }
    else{
        //this is used to create a new data 
        $nd->setreservation_id($_POST['id']);
        $nd->setfull_name($_POST['fullName']);
        $nd->setemail($_POST['email']);
        // use if else to match the facID and set the facility id accordingly
        if($_POST['facID']=='Meeting Room')
        {
            $nd->setfacility_id(1);
        }
        else if($_POST['facID']=='Seminar Room'){
            $nd->setfacility_id(2);
        }
        else if($_POST['facID']=='Hitech Room'){
            $nd->setfacility_id(3);
        }
        else if($_POST['facID']=='Gymanstic'){
            $nd->setfacility_id(4);
        }
        else if($_POST['facID']=='Auditorium'){
            $nd->setfacility_id(5);
        }
     
        $nd->setdate($_POST['date']);
        $nd->setlength($_POST['length']);
        //var_dump($nd);
       
        //Assemble the Reservation record to Insert/Create
        ReservationDAO::createReservation($nd);
    }
        //Send the Reservation record to the DAO for creation
}

//If there was a delete that came in via GET
if (isset($_GET["action"]) && $_GET["action"] == "delete")  {
    //Use the DAO to delete the corresponding Reservation record
    // call the delete Reservation function
    ReservationDAO::deleteReservation($_GET['reservation_id']);
}

// Display the header (remember to set the title/heading)
// Call the HTML header
Page::header();
// call the getfacility function for getting all the facility data
$facility= FacilityDAO::getFacility();

// List all Reservation.
$reservation = ReservationDAO::getReservations();
// call the listReservation function to show all the records
Page::listReservations($reservation);

// Note: You need to use the results from the corresponding DAO that gives you 
// the Reservation record list

//If there was a edit that came in via GET (URL query string)
if (isset($_GET["action"]) && $_GET["action"] == "edit")  {
    // call the getReservation for getting the single entry matching with reservation_id
    $res= ReservationDAO::getReservation($_GET['reservation_id']);
    // call the edit reservation form
    var_dump($res);
    Page::editReservationForm($res  ,$facility);
    //var_dump($res);
    // Use the DAO to pull that specific Reservation record
    // Hint: notice the url link for delete.... you should have something similar with edit
    // And you can access it through $_GET
    
    // Render the  Edit Section form with the Reservation record to edit. 
    // Remember to use the correct DAO to get the facility list
} else {
    // Otherwise, it is an add new Reservation record form
    // call the create reservation form 
    Page::createReservationForm($facility);

}
Page::footer();
// Finally, call the footer function
?>
