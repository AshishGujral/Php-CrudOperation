<?php

# Make sure to complete the listReservations, addReservationForm and editReservationForm functions

class Page  {

    public static $studentName = "Ashish Gujral";
    public static $studentID = "300336004";

    static function header()   { 
        ?>
        <!-- Start the page 'header' -->
        <!DOCTYPE html>
        <html>
            <head>
                <title></title>
                <meta charset="utf-8">
                <meta name="author" content="Bambang">
                <title>Lab 07 <?php echo self::$studentName; ?></title>   
                <link href="css/styles.css" rel="stylesheet">     
            </head>
            <body>
                <header>
                    <h1>Lab 07: PDO CRUD with DAO -- <?php echo self::$studentName ?> (<?php echo self::$studentID ?>)</h1>
                </header>
                <article>
    <?php }

    static function footer()   { ?>
        <!-- Start the page's footer -->            
                </article>
            </body>

        </html>

    <?php }

    // This function lists all reservation records
    static function listReservations(Array $reservations)    {
    ?>
        <!-- Start the page's show data form -->
        <section class="main">
        <h2>Current Data</h2>
        <table>
            <thead>
                <tr>
                <th>Reservation ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Facility</th>
                    <th>Date</th>
                    <th>Length</th>
                    <!-- Complete the remaining header -->
                    <th>Edit</th>
                    <th>Delete</th>
            </thead>
            <?php

                //List all the sections
                $i=0;
                // call the getReservationList method for getting the long_name save it in res
                $res=ReservationDAO::getReservationList();
                // use foreach loop to pass every data
                foreach($reservations as $reservation)  {
                    echo "<tbody><tr>\n";
                    // make sure to use the correct tr class
                    // echo "<tr class=
                    
                    // ... Write your code ...
                    echo "<td>".$reservation->getreservation_id(). "</td>";
                    echo "<td>".$reservation->getfull_name(). "</td>";
                    echo "<td>".$reservation->getemail(). "</td>";
                    // use res[i] to get the long_name
                    echo '<td>'.$res[$i]->long_name."</td>";
                    echo "<td>".$reservation->getdate(). "</td>";
                    echo "<td>".$reservation->getlength(). "</td>";

                    echo '<td><a href="'.$_SERVER['PHP_SELF'].'?action=edit&reservation_id='.$reservation->getreservation_id().'"> Edit </a></td>';
                    echo '<td><a href="'.$_SERVER['PHP_SELF'].'?action=delete&reservation_id='.$reservation->getreservation_id().'"> Delete </a></td>';
                    echo "</tr></tbody>\n";
                    $i++;
                } 
        
        echo '</table>
            </section>';
  
    }

    // this function displays the add new reservation record
    static function createReservationForm(Array $facilities)   { ?>        
        <!-- Start the page's add entry form -->
        <section class="form1">
            
                <h3>Add Reservation</h3>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <table>
                        <tr>
                            <td>Reservation ID</td>
                            <td><input type="text" name="id" placeholder="132AXXAXXA"></td>
                        </tr>
                        <tr>
                            <td>Full Name</td>
                            <td><input type="text" name="fullName"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="email"></td>
                        </tr>                        
                        <tr>
                            <td>Date</td>
                            <td><input type="date" name="date"></td>
                        </tr>
                        <tr>
                            <td>Length</td>
                            <td><input type="number" min="1" max="8" step="1" name="length"></td>
                        </tr>
                        <tr>
                            <td>Facility</td>
                            <td>
                            <select name="facID">
                            <?php
                                // use loop to list all facility long names 
                                // from the database as html's option element

                                foreach($facilities as $f){
                                    echo '<option>'.$f->getlong_name().'</option>';
                                }
                            ?>
                            </select>
                            </td>
                        </tr>
                    </table>
                    <!-- Use input type hidden to let us know that this action is to create -->
                    <input type="hidden" name="action" value="create">
                    <input type="submit" value="Add Reservation">
                </form>
            </section>

            <?php }

    // This function is to show the edit reservation record form
    // The edit form should be displayed only when the edit link is clicked
    // It should be controlled in the main file.
    static function editReservationForm(Reservation $reservationToEdit, Array $facilities)   {  
        // Make sure the form's method is pointing to $_SERVER["PHP_SELF"]
        // and it is using post method
        ?>        
        <!-- Start the page's edit entry form -->
        <section class="form1">
            <h3>Edit Reservation - <?php  echo"$reservationToEdit->reservation_id"// I should echo something here ?></h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; // which server should I send the post? ?>" method="post">
                <table>
                    <tr>
                        <td>Reservation ID</td>
                        <td><?php echo"$reservationToEdit->reservation_id"// What is the reservation ID of the record? ?></td>
                    </tr>
                    <!-- 
                        You know the drill from the add new reservation form 
                        Make sure to add all input entries corresponding to the selected 
                        reservation id. Don't forget to put the values...
                    -->
                    <tr>
                            <td>Full Name</td>
                            <td><input type="text" name="fullName"value="<?php echo "$reservationToEdit->full_name"?>"></td>
                        </tr>
                    <tr>
                            <td>Email</td>
                            <td><input type="email" name="email" value="<?php echo"$reservationToEdit->email"?>"></td>
                        </tr>                        
                        <tr>
                            <td>Date</td>
                            <td><input type="date" name="date" value="<?php echo "$reservationToEdit->date"?>"></td>
                        </tr>
                        <tr>
                            <td>Length</td>
                            <td><input type="number" min="1" max="8" step="1" name="length" value="<?php echo "$reservationToEdit->length"?>"></td>
                        </tr>
                        <td>Facility</td><?php echo($reservationToEdit->facility_id);?>
                        <td>
                        <select name="facID">
                        <?php
                            // use loop to list all facility long names 
                            // from the database as html's option element
                            // make sure the corresponding facility for this reservation is selected
                            echo($reservationToEdit->facility_id);
                            // use for loop to show all the options
                            for($i=1;$i<6;$i++)
                            {
                                
                                if($reservationToEdit->facility_id==$i){
                                    echo'<option selected>'.$facilities[$i-1]->getlong_name().'</option>';
                                }   
                                else{
                                    echo'<option>'.$facilities[$i-1]->getlong_name().'</option>';  
                                }                    
                            }
                            // use if else to selected particular option
                      
                           
                        ?>   
                        </select>
                        </td>
                    </tr>
                </table>
                <!-- We need another hidden input for student id here. Why? -->
                <input type="hidden" name="id" value="<?php echo"$reservationToEdit->reservation_id" // what is the record's student ID again? ?>">

                <!-- Use input type hidden to let us know that this action is to edit -->
                <input type="hidden" name="edit" value="edit">
                <input type="submit" value="Edit Reservation">                
            </form>
        </section>

<?php }

}