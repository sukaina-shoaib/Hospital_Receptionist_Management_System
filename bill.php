<?php
include("database/hospital_database.php");

if (isset($_GET['appointment_id'])) {
    $appointment_id = $_GET['appointment_id'];

    // Fetch bill details along with appointment day and time
    $bill_query = "SELECT 
                        b.Amount, 
                        p.Name AS patient_name, 
                        d.Name AS doctor_name, 
                        a.Appointment_Day, 
                        a.Appointment_Time 
                   FROM Bill b 
                   JOIN Appointment a ON b.Appointment_ID = a.Appointment_ID 
                   JOIN Patient p ON a.Patient_ID = p.Patient_ID 
                   JOIN Doctor d ON a.Doctor_ID = d.Doctor_ID 
                   WHERE b.Appointment_ID = '$appointment_id'";
    $bill_result = mysqli_query($conn, $bill_query);
    $bill = mysqli_fetch_assoc($bill_result);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bill</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: Arial, sans-serif;
                background-color: #f9f9f9;
                color: #333;
                padding: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            h2 {
                text-align: center;
                color: #4caf50;
                margin-bottom: 20px;
            }

            /* Card Style */
            .card {
                background-color: #fff;
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 80%;
                max-width: 500px;
                margin: 0 auto;
                text-align: center;
            }

            .card h2 {
                color: #4caf50;
                font-size: 24px;
                margin-bottom: 20px;
            }

            .card p {
                font-size: 18px;
                line-height: 1.6;
                margin-bottom: 15px;
            }

            .card p span {
                font-weight: bold;
                color: #4caf50;
            }

            /* Button styling */
            .back-button {
                display: inline-block;
                background-color: #4caf50;
                color: white;
                padding: 12px 24px;
                border: none;
                border-radius: 5px;
                text-decoration: none;
                font-size: 16px;
                text-align: center;
                margin-top: 20px;
            }

            .back-button:hover {
                background-color: #45a049;
            }

            .back-button:focus {
                outline: none;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                body {
                    padding: 15px;
                }

                .card {
                    width: 100%;
                    padding: 20px;
                }

                .card p {
                    font-size: 16px;
                }
            }
        </style>
    </head>
    <body>
        <div class="card">
            <h2>Bill Details</h2>
            <p><span>Patient Name:</span> <?php echo $bill['patient_name']; ?></p>
            <p><span>Doctor Name:</span> <?php echo $bill['doctor_name']; ?></p>
            <p><span>Appointment Day:</span> <?php echo $bill['Appointment_Day']; ?></p>
            <p><span>Appointment Time:</span> <?php echo $bill['Appointment_Time']; ?></p>
            <p><span>Amount:</span> <?php echo $bill['Amount']; ?></p>
            <a href="form.php" class="back-button">Back to Appointments</a>
        </div>
    </body>
    </html>

    <?php
} else {
    echo "Invalid request.";
}
?>
