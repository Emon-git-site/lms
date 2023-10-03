<?php
require_once 'header.php';
?>

<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Manage books</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Boos</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Book-Name</th>
                                <th>Book Image</th>
                                <th>Publication Name</th>
                                <th>Author Name</th>
                                <th>Purchase Date</th>
                                <th>Book Price</th>
                                <th>Book Quantity</th>
                                <th>Available Quantity</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $result = mysqli_query($con, "SELECT * FROM `books`");
                            while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                <tr>
                                   <td><?= $row['book_name'] ?></td>
                                   <td><img src="../images/books/<?= $row['book_image'] ?>" width="100px" alt=""></td>
                                   <td><?= $row['book_author_name'] ?></td>
                                   <td><?= $row['book_publication_name'] ?></td>
                                   <td><?= date('d-M-Y', strtotime($row['book_purchase_date'])) ?></td>
                                   <td><?= $row['book_price'] ?></td>
                                   <td><?= $row['book_qty'] ?></td>
                                   <td><?= $row['available_qty'] ?></td>
                                   <td>1</td>
                                   

                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
require_once 'footer.php';
?>