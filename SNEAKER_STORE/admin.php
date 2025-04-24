<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Management</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
    <nav id="nav">
            <div class="navTop">
                <div class="navItem">
                    <div class="search">
                        <input type="text" placeholder="Search..." class="searchInput">
                        <img src="./img/Contact/search.png" width="20" height="20" alt="" class="searchIcon">
                    </div>
    <h2>Payments</h2>
        <table>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Card Number</th>
                <th>Expiry Month</th>
                <th>Expiry Year</th>
                <th>CVV</th>
            </tr>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "sneaker_store";

            $conn = new mysqli($servername,$username,$password,$dbname);

            if($conn->connect_error){
                die("Connection failed:".$conn->connect_error);
            }

            $sql = "SELECT name, phone,address,card_number,expiry_month,expiry_year,cvv FROM payments";
            $result=$conn->query($sql);

            if(!$result){
                die("Query failed: ".$conn->error);
            }
            $serialNumber = 1;
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    echo"<tr>";
                    echo"<td>".$serialNumber."</td>";
                    echo"<td>".$row["name"]."</td>";
                    echo"<td>".$row["phone"]."</td>";
                    echo"<td>".$row["address"]."</td>";
                    echo"<td>".$row["card_number"]."</td>";
                    echo"<td>".$row["expiry_month"]."</td>";
                    echo"<td>".$row["expiry_year"]."</td>";
                    echo"<td>".$row["cvv"]."</td>";
                    echo"</tr>";
                    $serialNumber++;
                }
            }else{
                echo"<tr><td colspan = '8'>No payments found</td></tr>";
            }
            $conn->close();
        ?>
        </table>

       <button class="backButton" onclick="window.location='index.html'">BACK TO HOME PAGE</button>;
     

   </body>
     </html>
        