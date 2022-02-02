<?php


$db = mysqli_connect('localhost', 'root', '', 'college');


$create_table_qry = 'CREATE TABLE IF NOT EXISTS `books` (
    `book_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `accession_no` varchar(20) NOT NULL,
    `book_title` varchar(50) NOT NULL,
    `book_author` varchar(20) NOT NULL,
    `edition` varchar(20) NOT NULL,
    `publisher` varchar(20) NOT NULL
  )';

$create_table = mysqli_query($db, $create_table_qry);

$err_msg = $succ_msg = '';



if (isset($_POST['add_book'])) {
    $accession_no = $_POST['accession_no'];
    $book_title = $_POST['book_title'];
    $book_author = $_POST['book_author'];
    $edition = $_POST['edition'];
    $publisher = $_POST['publisher'];

    $err_msg .= (empty($accession_no)) ? '<p>Please enter  accession no</p>' : '';
    $err_msg .= (empty($book_title)) ? '<p>Please enter  book title</p>' : '';
    $err_msg .= (empty($book_author)) ? '<p>Please enter  author</p>' : '';
    $err_msg .= (empty($edition)) ? '<p>Please enter edition</p>' : '';
    $err_msg .= (empty($publisher)) ? '<p>Please enter publisher</p>' : '';

    if (strlen($err_msg) == 0) {
        $insert_book = "INSERT INTO books (accession_no, book_title,book_author, edition,publisher) VALUES ('$accession_no','$book_title','$book_author','$edition','$publisher')";
        $insert_result = mysqli_query($db, $insert_book);

        if ($insert_result)
            $succ_msg = "<p>Successfully added book</p>";
        else
            $err_msg = "<p>Could not add book</p>";
    }
}


if (isset($_POST['search_book'])) {
    $book_title = '%'. $_POST['book_title'] . '%';
    $books_qry = "SELECT * from books where book_title LIKE '$book_title'";
    $books_records = mysqli_query($db, $books_qry);
}


?>

<title>Book store</title>

<body>

    <center>
        <h3>BOOK DETAILS</h3>
    </center>

    <div class="container">

        <div>

            <form method="post">
                <input type="text" name="book_title" id="book_title" placeholder="Enter bookname to search ...">
                <input type="submit" name="search_book" value="Search">
            </form>

            <?php if (isset($_POST['search_book'])) {
            ?>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Accession no</th>
                            <th>Book title</th>
                            <th>Author</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                         while ($books = mysqli_fetch_array($books_records)) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $books['accession_no'] ?></td>
                            <td><?= $books['book_title'] ?></td>
                            <td><?= $books['book_author'] ?></td>

                        </tr>
                    <?php }  ?>
                    </tbody>
                </table>
            <?php } ?>
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
                <label for="fname">Accession no</label>
                <input type="text" id="accession_no" name="accession_no" required><br>



                <label for="lname">Book title</label>
                <input type="text" id="book_title" name="book_title" required><br>


                <label for="lname">Book author</label>
                <input type="text" id="book_author" name="book_author" required><br>


                <label for="lname">Edition</label>
                <input type="text" id="edition" name="edition" required><br>


                <label for="lname">Publisher name</label>
                <input type="text" id="publisher" name="publisher" required><br>




                <input type="submit" name="add_book" value="Add book"><br>
            </form>
        </div>



    </div>
</body>



