<?php
$conn= mysqli_connect('localhost', 'root', '', 'pharmacy');
if (!$conn) {
    die('Connection error : ' . mysqli_connect_error());
}
if(isset($_POST['add1'])) {
    $sql="insert into pharmacy(medcode,medname,quantity,unitprice,total) values ('$_POST[medcode]','$_POST[medname]','$_POST[quantity]','$_POST[unitprice]','$_POST[total]')";
    $result= mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Details Added Successfully')</script>";
        echo "<script>window.location.href=window.location.href</script>";    
    } 
}
    ?>
    <html>
<head>
    <title>pharmacy Management System</title>
   
</head>
<body>
    <div class="row">
        <div class="col-md-5" style="display: block;border-right: solid;border-width: 1px;">
            <form method="post" action="" onsubmit="return validateform()" name="myform">
                <table cellpadding="5px" cellspacing="5px"  align="center">
                    <tr>
                        <th colspan="2"><h1 align="center">HOSPITAL MANAGEMENT SYSTEM</h1></th>
                    </tr>
                    <tr>
                        <th colspan="2"><h3 align="center">BILLING</h3></th>
                    </tr>
                    <tr>
                        <th>Medicine Code</th>
                        <td><input type="text" name="medcode"></td>
                    </tr>
                    <tr>
                        <th>Medicine Name</th>
                        <td><input type="text" name="medname"></td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td><input type="text" name="quantity"></td>
                    </tr>
                    <tr>
                        <th>Unit Price</th>
                        <td><input type="text" name="unitprice"></td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td><input type="text" name="total"></td>
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
                </tr>
                <tr>
                </tr>
                <tr>
                </tr>
                <tr>
                    <th colspan="10"><h3 align="center">BILLS</h3></th>
                </tr>
                <tr>
                    <th colspan="5">
                        <?php
                        $sql="select * from pharmacy";
                        $res= mysqli_query($conn, $sql);
                        ?> 
                        <p>No: of bills : <?php echo mysqli_num_rows($res);?></p>                   
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    
                    <th>Medicine Code</th>
                    <th>Medicine Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
                <?php 
                $n=1;
                while($row=mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td><?php echo $n++?></td>
                        <td><?php echo $row['medcode']?></td>
                        <td><?php echo $row['medname']?></td>
                        <td><?php echo $row['quantity']?></td>
                        <td><?php echo $row['unitprice']?></td>
                        <td><?php echo $row['total']?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    <script>  
function validateform(){  
var medname=document.myform.medname.value;  
var medcode=document.myform.medcode.value;  
var quatity=document.myform.quantity.value;  
var unitprice=document.myform.unitprice.value;  


if (medname==null || medname==""){  
  alert("Name can't be blank");  
  return false;  
}else if(isNaN(medcode)){  
  alert("Please enter a numeric value");  
  return false;  
  }else if(isNaN(quantity)){  
  alert("Please enter a numeric value");  
  return false;  
  }else if(isNaN(unitprice)){  
  alert("Please enter a numeric value");  
  return false;  
  }  
  } 
  
</script>  
            </body>
            </html>
