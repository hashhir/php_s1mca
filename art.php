<?php
$conn= mysqli_connect('localhost', 'root', '', 'art');
if (!$conn) {
    die('Connection error : ' . mysqli_connect_error());
}
if(isset($_POST['add1'])) {
    $sql="insert into artwork(name,cdate,type) values ('$_POST[name]','$_POST[cdate]','$_POST[type]')";
    $result= mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Details Added Successfully')</script>";
        echo "<script>window.location.href=window.location.href</script>";    
    }    
}
if(isset($_POST['add2'])) {
    $sql="insert into artist(name,exp,category) values ('$_POST[name]',$_POST[exp],'$_POST[category]')";
    $result= mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Details Added Successfully')</script>";
        echo "<script>window.location.href=window.location.href</script>";    
    }    
}
if(isset($_POST['add3'])) {
    $sql="insert into customer(name,address,amount) values ('$_POST[name]','$_POST[address]',$_POST[amount])";
    $result= mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Details Added Successfully')</script>";
        echo "<script>window.location.href=window.location.href</script>";    
    }    
}
?>
<html>
<head>
    <title>Art Gallery Management System</title>
   
</head>
<body>
    <div class="row">
        <div class="col-md-5" style="display: block;border-right: solid;border-width: 1px;">
            <form method="post" action="">
                <table cellpadding="5px" cellspacing="5px"  align="center">
                    <tr>
                        <th colspan="2"><h1 align="center">Add ArtWork</h1></th>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <th>Created Date</th>
                        <td><input type="date" name="cdate"></td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td><input type="text" name="type"></td>
                    </tr>
                    <tr>
                        <th colspan="2" style="text-align: center;">
                            <input type="submit" value="Add" name="add1" style="background-color: linen;">
                        </th>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-md-7" style="display: block;overflow-x: auto;">
            <table cellpadding="5px" cellspacing="5px"  align="center">
                <tr>
                    <th colspan="10"><h1 align="center">ArtWork Details</h1></th>
                </tr>
                <tr>
                    <th colspan="5">
                        <?php
                        $sql="select * from artwork";
                        $res= mysqli_query($conn, $sql);
                        ?> 
                        <p>No: of artworks : <?php echo mysqli_num_rows($res);?></p>                   
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    
                    <th>Name</th>
                    <th>Created Date</th>
                    <th>Type</th>
                </tr>
                <?php 
                $n=1;
                while($row=mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td><?php echo $n++?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['cdate']?></td>
                        <td><?php echo $row['type']?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-5" style="display: block;border-right: solid;border-width: 1px;">
            <form method="post" action="">
                <table cellpadding="5px" cellspacing="5px"  align="center">
                    <tr>
                        <th colspan="2"><h1 align="center">Add Artist</h1></th>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <th>Experiance</th>
                        <td><input type="number" name="exp"></td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td><input type="text" name="category"></td>
                    </tr>
                    <tr>
                        <th colspan="2" style="text-align: center;">
                            <input type="submit" value="Add" name="add2" style="background-color: linen;">
                        </th>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-md-7" style="display: block;overflow-x: auto;">
            <table cellpadding="5px" cellspacing="5px"  align="center">
                <tr>
                    <th colspan="10"><h1 align="center">Artist Details</h1></th>
                </tr>
                <tr>
                    <th colspan="5">
                        <?php
                        $sql="select * from artist";
                        $res= mysqli_query($conn, $sql);
                        ?>      
                        <p>No: of artists : <?php echo mysqli_num_rows($res);?></p>              
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    
                    <th>Name</th>
                    <th>Experiance</th>
                    <th>Category</th>
                </tr>
                <?php 
                $n=1;
                while($row=mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td><?php echo $n++?></td>
                        
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['exp']?></td>
                        <td><?php echo $row['category']?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-5" style="display: block;border-right: solid;border-width: 1px;">
            <form method="post" action="">
                <table cellpadding="5px" cellspacing="5px"  align="center">
                    <tr>
                        <th colspan="2"><h1 align="center">Add Customer</h1></th>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><textarea name="address" rows="5" style="height: auto;border-style: inset;border-width: 2px;"></textarea></td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td><input type="number" name="amount"></td>
                    </tr>
                    <tr>
                        <th colspan="2" style="text-align: center;">
                            <input type="submit" value="Add" name="add3" style="background-color: linen;">
                        </th>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-md-7" style="display: block;overflow-x: auto;">
            <table cellpadding="5px" cellspacing="5px"  align="center">
                <tr>
                    <th colspan="10"><h1 align="center">Customer Details</h1></th>
                </tr>
                <tr>
                    <th colspan="5">
                        <?php
                        $sql="select * from customer";
                        $res= mysqli_query($conn, $sql);
                        ?>                    
                        <p>No: of customers : <?php echo mysqli_num_rows($res);?></p>
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                   
                    <th>Name</th>
                    <th>Address</th>
                    <th>Amount</th>
                </tr>
                <?php 
                $n=1;
                while($row=mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td><?php echo $n++?></td>
                        
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['address']?></td>
                        <td><?php echo $row['amount']?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>