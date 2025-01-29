<?php
include("database/hospital_database.php");

if (isset($_POST['appointment_id'])) {
    $appointment_id = $_POST['appointment_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_day = $_POST['appointment_day'];
    $appointment_time = $_POST['appointment_time'];

    // Update the appointment details in the database
    $update_query = "UPDATE Appointment SET Doctor_ID = '$doctor_id', Appointment_Day = '$appointment_day', Appointment_Time = '$appointment_time' WHERE Appointment_ID = '$appointment_id'";

    if (mysqli_query($conn, $update_query)) {
        header("Location: form.php");
        exit(); 
    } else {
        echo json_encode([
            'success' => false,
            'error' => mysqli_error($conn)
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'error' => 'Appointment ID not provided.'
    ]);
}
?>
