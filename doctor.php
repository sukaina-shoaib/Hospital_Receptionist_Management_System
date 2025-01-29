
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor List</title>
    <style>
        body{
            background-image: url(images/indexbg.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
        h1{
            color: black;
            align-items: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            background-color: rgba(247, 245, 245, 0.6);
        }
        th {
            background-color:rgb(225, 0, 0,0.6);
            color: white
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        *{transition:all 0.3s ease-in-out;}

.container{
  clear:both;
  
  overflow:auto;
  background-color: rgba(247, 245, 245, 0.6);
 
}

nav{float:right;}

.logo img{float:left;}

ul li{
  display: inline-block; 
  padding:5px;
  align-items: center;
  font-size:20px; font-family:raleway;
  
}
li a{
    color: black;
    padding: 10px;
    text-decoration: none;
}
li :hover{
  background-color: rgb(199, 46, 46,0.6);
  color: aliceblue;
  border-radius: 20px;
  
}
    </style>
</head>
<body>
<div class="container">
<div class="logo">
  <img src="images/logo.png" alt=""  width="50" >
  </div>
<nav>
  <ul>
  <li><a href="form.php" >Home</a></li>
  <li><a href="services.html" target="_blank">Services</a></li>
  <li><a href="doctor.php" target="_blank">doctors</a></li>
  <li><a href="login.html" >logout</a></li>
  </ul>
  </nav>
</div>
<hr />
    <h1>Doctor List</h1>
    <table>
        <thead>
            <tr>
                <th>Doctor ID</th>
                <th>Name</th>
                <th>Specialty</th>
                <th>Doctor Days</th>
                <th>Doctor Time</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // include("database/hospital_database.php");
                $con = mysqli_connect('localhost', 'root', '', 'database');

                if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM doctor";
                $records = mysqli_query($con, $sql);

                if (mysqli_num_rows($records) > 0) {
                    while ($row = mysqli_fetch_assoc($records)) {
                        echo "<tr>";
                        echo "<td>" . $row['Doctor_ID'] . "</td>";
                        echo "<td>" . $row['Name'] . "</td>";
                        echo "<td>" . $row['Specialty'] . "</td>";
                        echo "<td>" . $row['Doctor_Days'] . "</td>";
                        echo "<td>" . $row['Doctor_Time'] . "</td>";
                        echo "<td>" . $row['Amount'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }

                mysqli_close($con);
            ?>
        </tbody>
    </table>
</body>
</html>
