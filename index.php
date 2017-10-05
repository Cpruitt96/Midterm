<?php
    require_once('database.php');
    
    $state = "CA";
    $query = "SELECT firstName, lastName, city FROM customers WHERE state = ? Order By lastName";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $state);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($firstName, $lastName, $city);
    
    
    $version = 2.0;
    $query2 = "SELECT productCode, name FROM products WHERE version = ?";
    
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param('s', $version);
    $stmt2->execute();
    $stmt2->store_result();
    $stmt2->bind_result($productCode, $name);
    
   
   
   
?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Cusomter Relations</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <div id="page">

    <div id="header">
        <h1>Customers and Products</h1>
    </div>

    <div id="main">

        
       

        <div id="content">
            <!-- display a table of customers -->
            
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>City</th>
                </tr>
                    <?php 
                    while ($stmt->fetch()){ ?>
                        <tr> 
                            <td><?php echo $firstName; ?></td>
                            <td><?php echo $lastName; ?></td>
                            <td><?php echo $city; ?></td>
                        </tr>
                    
                        
                    <?php } ?>
                
                
            </table>
            
        </div>
        
        
        <div id="content">
            <!-- display a table of customers -->
            
            <table>
                <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                </tr>
                    <?php 
                    while ($stmt2->fetch()){ ?>
                        <tr> 
                            <td><?php echo $productCode; ?></td>
                            <td><?php echo $name; ?></td>
                        </tr>
                    
                        
                    <?php } ?>
                
                
            </table>
            
        </div>
    </div>
    
    
    
    <div id="footer">
        <p>&copy;  Columnus State University</p>
    </div>

    </div><!-- end page -->
    
    <?php
     $stmt->free_result();
    mysqli_close($conn);
    ?>
</body>
</html>
>