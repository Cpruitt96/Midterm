<?php
    require_once('database.php');
    
    $customerID = 1008;
    $query = "SELECT firstName, lastName, address, city, state FROM customers WHERE customerID = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $customerID);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($firstName, $lastName, $address, $city, $state);
    
    while($stmt->fetch()) {
        echo "First: ".$firstName;
        echo "<br />Last: ".$lastName;
        echo "<br />Address: ".$address;
        echo "<br />City: ".$city;
        echo "<br />State: ".$state;
    }
    $stmt->free_result();
    mysqli_close($conn);

   
?>
<!--
<!DOCTYPE html>
<html>

<!-- the head section -->
<!--<head>
    <title>Cusomter Relations</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<!--<body>
    <div id="page">

    <div id="header">
        <h1>Customers</h1>
    </div>

    <div id="main">

        <h1>Customer List</h1>

       

        <div id="content">
            <!-- display a table of products -->
            
            <!--<table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
                
                <tr>
                    <td>?></td>
                </tr>
                
            </table>
            
        </div>
    </div>

    <div id="footer">
        <p>&copy;  Columnus State University</p>
    </div>

    </div><!-- end page -->
<!--</body>
</html>
-->