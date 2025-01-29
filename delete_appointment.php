<?php
include("database/hospital_database.php");

if (isset($_POST['appointment_id'])) {
    $appointment_id = $_POST['appointment_id'];

    // First, get the Patient_ID from the Appointment table to use for deleting the Bill record
    $appointment_query = "SELECT Patient_ID FROM Appointment WHERE Appointment_ID = '$appointment_id'";
    $appointment_result = mysqli_query($conn, $appointment_query);
    if ($appointment_result) {
        $appointment_row = mysqli_fetch_assoc($appointment_result);
        $patient_id = $appointment_row['Patient_ID'];

        // Delete the Bill record related to the appointment
        $delete_bill_query = "DELETE FROM Bill WHERE Appointment_ID = '$appointment_id'";
        if (mysqli_query($conn, $delete_bill_query)) {
            // Now delete the Appointment record
            $delete_appointment_query = "DELETE FROM Appointment WHERE Appointment_ID = '$appointment_id'";
            if (mysqli_query($conn, $delete_appointment_query)) {
                echo "success";
            } else {
                echo "Error deleting appointment: " . mysqli_error($conn);
            }
        } else {
            echo "Error deleting bill: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Appointment not found.";
    }
}
?>
