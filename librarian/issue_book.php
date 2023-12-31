<?php
require_once 'header.php';

if(isset($_POST['issue_book'])){
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    $book_issue_date = $_POST['book_issue_date'];
    $Issue_book_result = mysqli_query($con, "INSERT INTO `issue_books`(`student_id`, `book_id`, `book_issue_date` ) VALUES ('$student_id','$book_id','$book_issue_date')");
    if($Issue_book_result){
        ?>
        <script type="text/javascript">
            alert('Book issued successfully');
        </script>
        <?php
       } else{
            ?>
             <script type="text/javascript">
            alert('Book not issue');
        </script>

        <?php } 
    
}
?>

<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Issue Book</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp  ">
    <div class="col-sm-12" col-sm-offset-3>
        <div class="panel-content">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-inline" method="post" action="">
                        <div class="form-group">

                            <select name="student_id" class="form-control">
                                <option value="">Select</option>
                                <?php
                                $result = mysqli_query($con, "SELECT * FROM `students` WHERE `status` = '1' ");
                                while ($row = mysqli_fetch_assoc($result)) { ?>

                                    <option value="<?= $row['id'] ?> "> <?= ucwords($row['fname'] . " " . $row['lname'] . "- ( " . $row['roll']) . ")" ?></option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="search" class="btn btn-primary">search</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if (isset($_POST['search'])) {
                $id = $_POST['student_id'];
                $result = mysqli_query($con, "SELECT * FROM `students` WHERE  `id` = '$id' AND `status` = '1' ");
                $row = mysqli_fetch_assoc($result);
            ?>

                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="name">Student Name</label>
                                        <input type="text" class="form-control" id="name" value="<?= ucwords($row['fname'] . " " . $row['lname'] . "- ( " . $row['roll']) . ")" ?>" readonly>
                                        <input type="hidden" value="<?= $row['id'] ?>" name="student_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Book Name</label>
                                        <select name="book_id" class="form-control">
                                            <option value="">Select</option>
                                            <?php
                                            $result = mysqli_query($con, "SELECT * FROM `books` WHERE `available_qty`>0;");
                                            while ($row = mysqli_fetch_assoc($result)) { ?>

                                                <option value="<?= $row['id'] ?>" > <?= $row['book_name'] ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Book Issue Date</label>
                                        <input type="text" class="form-control" name="book_issue_date" value="<?= date('d-m-Y')?>" readonly>

                                        </div>
                                    <div class="form-group">
                                        <button type="submit" name="issue_book" class="btn btn-primary">Save Issue Book</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>
        </div>
    </div>

</div>


<?php
require_once 'footer.php';
?>