<?php


$db = mysqli_connect('localhost', 'root', '', 'college');


$create_table_qry = 'CREATE TABLE IF NOT EXISTS `railway` (
    `ticket_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `full_name` varchar(20) NOT NULL,
    `address` varchar(50) NOT NULL,
    `train_no` varchar(10) NOT NULL,
    `train_name` varchar(15) NOT NULL,
    `date_of_journey` date NOT NULL,
    `boarding_time` time NOT NULL
  )';

$create_table = mysqli_query($db, $create_table_qry);

$err_msg = $succ_msg = '';



if (isset($_POST['book_ticket'])) {
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $train_no = $_POST['train_no'];
    $train_name = $_POST['train_name'];
    $date_of_journey = $_POST['date_of_journey'];
    $boarding_time = $_POST['boarding_time'];

    $err_msg .= (empty($full_name)) ? '<p>Please enter  full name</p>' : '';
    $err_msg .= (empty($address)) ? '<p>Please enter  address</p>' : '';
    $err_msg .= (empty($train_no)) ? '<p>Please enter  train name</p>' : '';
    $err_msg .= (empty($train_name)) ? '<p>Please enter train name</p>' : '';
    $err_msg .= (empty($date_of_journey)) ? '<p>Please enter date of journey</p>' : '';
    $err_msg .= (empty($boarding_time)) ? '<p>Please enter  boarding time</p>' : '';

    if (strlen($err_msg) == 0) {
        $insert_ticket = "INSERT INTO railway (full_name, address,train_no, train_name,date_of_journey,boarding_time) VALUES ('$full_name','$address','$train_no','$train_name','$date_of_journey','$boarding_time')";
        $insert_result = mysqli_query($db, $insert_ticket);

        if ($insert_result)
            $succ_msg = "<p>Successfully booked ticket</p>";
        else
            $err_msg = "<p>Could not book ticket</p>";
    }
}



$tickets_qry = 'SELECT * from railway';
$tickets_records = mysqli_query($db, $tickets_qry);



?>

<title>Railway ticket booking</title>

<body>

<center><h3>Railway ticket booking</h3></center>

    <div class="container">

        <div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Train No</th>
                        <th>Boarding time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    while ($tickets = mysqli_fetch_array($tickets_records)) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $tickets['full_name'] ?></td>
                            <td><?= $tickets['train_name'] ?></td>
                            <td><?= $tickets['boarding_time'] ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


        <div>



            <?php if (strlen($err_msg > 0)) : ?>


                <div class="alert alert-error">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <?= $err_msg ?>
                </div>


            <?php endif; ?>

            <?php if (strlen($succ_msg > 0)) : ?>


                <div class="alert alert-success">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <?= $succ_msg ?>
                </div>



            <?php endif; ?>



            <form method="post">
                <label for="fname">Full Name</label>
                <input type="text" id="full_name" name="full_name" placeholder="Your name.." required><br>

                <label for="lname">Address</label>
                <textarea name="address" id="address" cols="30" rows="10" required>
                </textarea><br>


                <label for="lname">Train No</label>
                <input type="text" id="train_no" name="train_no" placeholder="Train no.." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"><br>
                 <br>

                <label for="lname">Train Name</label>
                <input type="text" id="train_name" name="train_name" placeholder="Train name.." required><br>


                <label for="lname">Date of journey</label>
                <input type="date" id="date_of_journey" name="date_of_journey" placeholder="Date of journey.." required><br>


                <label for="lname">Time of boarding</label>
                <input type="time" id="boarding_time" name="boarding_time" placeholder="Time of boarding.." required><br>



                <input type="submit" name="book_ticket" value="Book ticket"><br>
                <!-- <input type="submit" name="show_tickets" value="Show tickets"> -->
            </form>
        </div>



    </div>
</body>
