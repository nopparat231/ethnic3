<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">ร้านเครื่องแต่งกาย</h1>

<?php if (isset($_GET['add'])) { ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">เพิ่มข้อมูล ร้านเครื่องแต่งกาย</h6>

        </div>

        <div class="card-body">

            <form action="?amallplace&search=tl04&add_db" method="post">

                <div class="mb-3">
                    <label for="Clothesplace_id" class="form-label">รหัสร้านเครื่องแต่งกาย</label>
                    <input type="text" class="form-control" id="Clothesplace_id" name="Clothesplace_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Clothesplace_name" class="form-label">ชื่อร้านเครื่องแต่งกาย</label>
                    <input type="text" class="form-control" id="Clothesplace_name" name="Clothesplace_name" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Clothesplace_longitude" class="form-label"> Clothesplace_longitude</label>
                    <input type="text" class="form-control" id="Clothesplace_longitude" name="Clothesplace_longitude" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Clothesplace_latitude" class="form-label"> Clothesplace_latitude</label>
                    <input type="text" class="form-control" id="Clothesplace_latitude" name="Clothesplace_latitude" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Clothesplace_costmin" class="form-label"> Clothesplace_costmin</label>
                    <input type="text" class="form-control" id="Clothesplace_costmin" name="Clothesplace_costmin" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Clothesplace_detail" class="form-label">Clothesplace_detail</label>
                    <textarea class="form-control" id="Clothesplace_detail" rows="3" name="Clothesplace_detail" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="Ethnic_id" class="form-label"> Ethnic_id</label>
                    <input type="text" class="form-control" id="Ethnic_id" name="Ethnic_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Typelocation_id" class="form-label"> Typelocation_id</label>
                    <input type="text" class="form-control" id="Typelocation_id" name="Typelocation_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Province_id" class="form-label"> Province_id</label>
                    <input type="text" class="form-control" id="Province_id" name="Province_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Clothesplace_costmax" class="form-label"> Clothesplace_costmax</label>
                    <input type="text" class="form-control" id="Clothesplace_costmax" name="Clothesplace_costmax" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Clothesplace_open" class="form-label"> Clothesplace_open</label>
                    <input type="text" class="form-control" id="Clothesplace_open" name="Clothesplace_open" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Clothesplace_clo" class="form-label"> Clothesplace_clo</label>
                    <input type="text" class="form-control" id="Clothesplace_clo" name="Clothesplace_clo" autocomplete="off" required>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" onclick="history.back()">Cancle</a>
            </form>

        </div>

    </div>

    <?php } elseif (isset($_GET['edit'])) {

    if (isset($_GET['Clothesplace_id'])) {

        $Clothesplace_id = $_GET['Clothesplace_id'];

        $sql1 = "SELECT * FROM clothesplace WHERE Clothesplace_id = '$Clothesplace_id' ";
        $q1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_array($q1);

    ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">แก้ไขข้อมูล ร้านเครื่องแต่งกาย</h6>

            </div>

            <div class="card-body">

                <form action="?amallplace&search=tl04&edit_db" method="post">

                    <div class="mb-3">
                        <label for="Clothesplace_id" class="form-label">รหัสร้านเครื่องแต่งกาย</label>
                        <input type="text" class="form-control" id="Clothesplace_id" name="Clothesplace_id" value="<?php echo $row['Clothesplace_id'] ?>" autocomplete="off" required readonly>
                    </div>

                    <div class="mb-3">
                        <label for="Clothesplace_name" class="form-label">ชื่อร้านเครื่องแต่งกาย</label>
                        <input type="text" class="form-control" id="Clothesplace_name" name="Clothesplace_name" value="<?php echo $row['Clothesplace_name'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Clothesplace_longitude" class="form-label"> Clothesplace_longitude</label>
                        <input type="text" class="form-control" id="Clothesplace_longitude" name="Clothesplace_longitude" value="<?php echo $row['Clothesplace_longitude'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Clothesplace_latitude" class="form-label"> Clothesplace_latitude</label>
                        <input type="text" class="form-control" id="Clothesplace_latitude" name="Clothesplace_latitude" value="<?php echo $row['Clothesplace_latitude'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Clothesplace_costmin" class="form-label"> Clothesplace_costmin</label>
                        <input type="text" class="form-control" id="Clothesplace_costmin" name="Clothesplace_costmin" value="<?php echo $row['Clothesplace_costmin'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Clothesplace_detail" class="form-label">Clothesplace_detail</label>
                        <textarea class="form-control" id="Clothesplace_detail" rows="3" name="Clothesplace_detail" required><?php echo $row['Clothesplace_detail'] ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="Ethnic_id" class="form-label"> Ethnic_id</label>
                        <input type="text" class="form-control" id="Ethnic_id" name="Ethnic_id" value="<?php echo $row['Ethnic_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Typelocation_id" class="form-label"> Typelocation_id</label>
                        <input type="text" class="form-control" id="Typelocation_id" name="Typelocation_id" value="<?php echo $row['Typelocation_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Province_id" class="form-label"> Province_id</label>
                        <input type="text" class="form-control" id="Province_id" name="Province_id" value="<?php echo $row['Province_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Clothesplace_costmax" class="form-label"> Clothesplace_costmax</label>
                        <input type="text" class="form-control" id="Clothesplace_costmax" name="Clothesplace_costmax" value="<?php echo $row['Clothesplace_costmax'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Clothesplace_open" class="form-label"> Clothesplace_open</label>
                        <input type="text" class="form-control" id="Clothesplace_open" name="Clothesplace_open" value="<?php echo $row['Clothesplace_open'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Clothesplace_clo" class="form-label"> Clothesplace_clo</label>
                        <input type="text" class="form-control" id="Clothesplace_clo" name="Clothesplace_clo" value="<?php echo $row['Clothesplace_clo'] ?>" autocomplete="off" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-danger" onclick="history.back()">Cancle</a>
                </form>

            </div>

        </div>


    <?php
    }
    //เพิ่ม db
} elseif (isset($_GET['add_db'])) {

    if (isset($_POST['Clothesplace_id'])) {

        $Clothesplace_id = $_POST["Clothesplace_id"];
        $Clothesplace_name = $_POST["Clothesplace_name"];
        $Clothesplace_longitude = $_POST["Clothesplace_longitude"];
        $Clothesplace_latitude = $_POST["Clothesplace_latitude"];
        $Clothesplace_costmin = $_POST["Clothesplace_costmin"];
        $Clothesplace_detail = $_POST["Clothesplace_detail"];
        $Ethnic_id = $_POST["Ethnic_id"];
        $Typelocation_id = $_POST["Typelocation_id"];
        $Province_id = $_POST["Province_id"];
        $Clothesplace_costmax = $_POST["Clothesplace_costmax"];
        $Clothesplace_open = $_POST["Clothesplace_open"];
        $Clothesplace_clo = $_POST["Clothesplace_clo"];


        $strSQL = "INSERT INTO clothesplace
        values ('" . $Clothesplace_id . "',
                '" . $Clothesplace_name . "',
                '" . $Clothesplace_longitude . "',
                '" . $Clothesplace_latitude . "',
                '" . $Clothesplace_costmin . "',
                '" . $Clothesplace_detail . "',
                '" . $Ethnic_id . "',
                '" . $Typelocation_id . "',
                '" . $Province_id . "',
                '" . $Clothesplace_costmax . "',
                '" . $Clothesplace_open . "',
                '" . $Clothesplace_clo . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?search=tl04&amallplace';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?search=tl04&amallplace';
              </script>";
        }
    }

    //แก้ไข db
} elseif (isset($_GET['edit_db'])) {

    if (isset($_POST['Clothesplace_id'])) {

        $strSQL = "update clothesplace set Clothesplace_id = '" . $_POST['Clothesplace_id'] . "'
        , Clothesplace_name =  '" . $_POST['Clothesplace_name'] . "'
        , Clothesplace_longitude =  '" . $_POST['Clothesplace_longitude'] . "'
        , Clothesplace_latitude =  '" . $_POST['Clothesplace_latitude'] . "'
        , Clothesplace_costmin =  '" . $_POST['Clothesplace_costmin'] . "'
        , Clothesplace_detail =  '" . $_POST['Clothesplace_detail'] . "'
        , Ethnic_id =  '" . $_POST['Ethnic_id'] . "'
        , Typelocation_id =  '" . $_POST['Typelocation_id'] . "'
        , Province_id =  '" . $_POST['Province_id'] . "'
        , Clothesplace_costmax =  '" . $_POST['Clothesplace_costmax'] . "'
        , Clothesplace_open =  '" . $_POST['Clothesplace_open'] . "'
        , Clothesplace_clo =  '" . $_POST['Clothesplace_clo'] . "'
        where Clothesplace_id IN ('" . $_POST['Clothesplace_id'] . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?search=tl04&amallplace';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?search=tl04&amallplace';
              </script>";
        }
    }

    //ลบ
} elseif (isset($_GET['del'])) {

    if (isset($_GET['Clothesplace_id'])) {

        $Clothesplace_id = $_GET['Clothesplace_id'];

        $sql = "DELETE FROM clothesplace WHERE Clothesplace_id ='$Clothesplace_id'";

        if (mysqli_query($conn, $sql) == TRUE) {

            echo "<script>
            alert('ลบสำเร็จ');
            window.location.href = 'index.php?search=tl04&amallplace';
            </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?search=tl04&amallplace';
            </script>";
        }
    }
} else {

    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <a href="?amallplace&search=tl04&add" class="btn btn-success btn-circle float-end">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>รหัสร้านเครื่องแต่งกาย</th>
                            <th>ชื่อร้านเครื่องแต่งกาย</th>
                            <th>Clothesplace_longitude</th>
                            <th>Clothesplace_latitude</th>
                            <th>Clothesplace_costmin</th>
                            <th>Clothesplace_detail</th>
                            <th>Ethnic_id</th>
                            <th>Typelocation_id</th>
                            <th>Province_id</th>
                            <th>Clothesplace_costmax</th>
                            <th>Clothesplace_open</th>
                            <th>Clothesplace_clo</th>

                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $sql1 = "SELECT * FROM clothesplace";
                        $q1 = mysqli_query($conn, $sql1);
                        while ($row = mysqli_fetch_array($q1)) {

                            echo "<tr>";
                            echo "<td>" . $row['Clothesplace_id'] . "</td>";
                            echo "<td>" . $row['Clothesplace_name'] . "</td>";
                            echo "<td>" . $row['Clothesplace_longitude'] . "</td>";
                            echo "<td>" . $row['Clothesplace_latitude'] . "</td>";
                            echo "<td>" . $row['Clothesplace_costmin'] . "</td>";
                            echo "<td>" . $row['Clothesplace_detail'] . "</td>";
                            echo "<td>" . $row['Ethnic_id'] . "</td>";
                            echo "<td>" . $row['Typelocation_id'] . "</td>";
                            echo "<td>" . $row['Province_id'] . "</td>";
                            echo "<td>" . $row['Clothesplace_costmax'] . "</td>";
                            echo "<td>" . $row['Clothesplace_clo'] . "</td>";
                            echo "<td>" . $row['Clothesplace_clo'] . "</td>";
                            echo '<td style="text-align: center"> <a href="?amallplace&search=tl04&edit&Clothesplace_id=' . $row['Clothesplace_id'] . '" class="btn btn-warning btn-sm float-end"><i class="fas fa-pencil-alt"></i></a> </td>';
                            echo "<td style='text-align: center'> <a href='?amallplace&search=tl04&del&Clothesplace_id=" . $row['Clothesplace_id'] . "' onclick=\"return confirm('ต้องการลบรายการนี้ใช่หรือไม่?')\" class='btn btn-danger btn-sm float-end'><i class='fas fa-trash'></i></a> </td>";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php } ?>