<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">วัฒนธรรมและประเพณี</h1>

<?php if (isset($_GET['add'])) { ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">เพิ่มข้อมูล วัฒนธรรมและประเพณี</h6>

        </div>

        <div class="card-body">

            <form action="?amallplace&search=tl02&add_db" method="post">

                <div class="mb-3">
                    <label for="Customplace_id" class="form-label">รหัสวัฒนธรรมและประเพณี</label>
                    <input type="text" class="form-control" id="Customplace_id" name="Customplace_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Province_id" class="form-label">Province_id</label>
                    <input type="text" class="form-control" id="Province_id" name="Province_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Customplace_longitude" class="form-label"> Customplace_longitude</label>
                    <input type="text" class="form-control" id="Customplace_longitude" name="Customplace_longitude" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Customplace_latitude" class="form-label"> Customplace_latitude</label>
                    <input type="text" class="form-control" id="Customplace_latitude" name="Customplace_latitude" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Customplace_detail" class="form-label"> Customplace_detail</label>
                    <input type="text" class="form-control" id="Customplace_detail" name="Customplace_detail" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Custom_id" class="form-label"> Custom_id</label>
                    <input type="text" class="form-control" id="Custom_id" name="Custom_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Typelocation_id" class="form-label"> Typelocation_id</label>
                    <input type="text" class="form-control" id="Typelocation_id" name="Typelocation_id" autocomplete="off" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" onclick="history.back()">Cancle</a>
            </form>

        </div>

    </div>

    <?php } elseif (isset($_GET['edit'])) {

    if (isset($_GET['Customplace_id'])) {

        $Customplace_id = $_GET['Customplace_id'];

        $sql1 = "SELECT * FROM customplace WHERE Customplace_id = '$Customplace_id' ";
        $q1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_array($q1);

    ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">แก้ไขข้อมูล วัฒนธรรมและประเพณี</h6>

            </div>

            <div class="card-body">

                <form action="?amallplace&search=tl02&edit_db" method="post">

                    <div class="mb-3">
                        <label for="Customplace_id" class="form-label">รหัสวัฒนธรรมและประเพณี</label>
                        <input type="text" class="form-control" id="Customplace_id" name="Customplace_id" value="<?php echo $row['Customplace_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Province_id" class="form-label">Province_id</label>
                        <input type="text" class="form-control" id="Province_id" name="Province_id" value="<?php echo $row['Province_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Customplace_longitude" class="form-label"> Customplace_longitude</label>
                        <input type="text" class="form-control" id="Customplace_longitude" name="Customplace_longitude" value="<?php echo $row['Customplace_longitude'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Customplace_latitude" class="form-label"> Customplace_latitude</label>
                        <input type="text" class="form-control" id="Customplace_latitude" name="Customplace_latitude" value="<?php echo $row['Customplace_latitude'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Customplace_detail" class="form-label"> Customplace_detail</label>
                        <input type="text" class="form-control" id="Customplace_detail" name="Customplace_detail" value="<?php echo $row['Customplace_detail'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Custom_id" class="form-label"> Custom_id</label>
                        <input type="text" class="form-control" id="Custom_id" name="Custom_id" value="<?php echo $row['Custom_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Typelocation_id" class="form-label"> Typelocation_id</label>
                        <input type="text" class="form-control" id="Typelocation_id" name="Typelocation_id" value="<?php echo $row['Typelocation_id'] ?>" autocomplete="off" required>
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

    if (isset($_POST['Customplace_id'])) {

        $Customplace_id = $_POST["Customplace_id"];
        $Province_id = $_POST["Province_id"];
        $Customplace_longitude = $_POST["Customplace_longitude"];
        $Customplace_latitude = $_POST["Customplace_latitude"];
        $Customplace_detail = $_POST["Customplace_detail"];
        $Custom_id = $_POST["Custom_id"];
        $Typelocation_id = $_POST["Typelocation_id"];


        $strSQL = "INSERT INTO customplace
        values ('" . $Customplace_id . "',
                '" . $Province_id . "',
                '" . $Customplace_longitude . "',
                '" . $Customplace_latitude . "',
                '" . $Customplace_detail . "',
                '" . $Custom_id . "',
                '" . $Typelocation_id . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?search=tl02&amallplace';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?search=tl02&amallplace';
              </script>";
        }
    }

    //แก้ไข db
} elseif (isset($_GET['edit_db'])) {

    if (isset($_POST['Customplace_id'])) {

        $strSQL = "update customplace set Customplace_id = '" . $_POST['Customplace_id'] . "'
        , Province_id =  '" . $_POST['Province_id'] . "'
        , Customplace_longitude =  '" . $_POST['Customplace_longitude'] . "'
        , Customplace_latitude =  '" . $_POST['Customplace_latitude'] . "'
        , Customplace_detail =  '" . $_POST['Customplace_detail'] . "'
        , Custom_id =  '" . $_POST['Custom_id'] . "'
        , Typelocation_id =  '" . $_POST['Typelocation_id'] . "'
        where Customplace_id IN ('" . $_POST['Customplace_id'] . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?search=tl02&amallplace';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?search=tl02&amallplace';
              </script>";
        }
    }

    //ลบ
} elseif (isset($_GET['del'])) {

    if (isset($_GET['Customplace_id'])) {

        $Customplace_id = $_GET['Customplace_id'];

        $sql = "DELETE FROM customplace WHERE Customplace_id ='$Customplace_id'";

        if (mysqli_query($conn, $sql) == TRUE) {

            echo "<script>
            alert('ลบสำเร็จ');
            window.location.href = 'index.php?search=tl02&amallplace';
            </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?search=tl02&amallplace';
            </script>";
        }
    }
} else {

    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <a href="?amallplace&search=tl02&add" class="btn btn-success btn-circle float-end">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>รหัสวัฒนธรรมและประเพณี</th>
                            <th>Province_id</th>
                            <th>Customplace_longitude</th>
                            <th>Customplace_latitude</th>
                            <th>Customplace_detail</th>
                            <th>Custom_id</th>
                            <th>Typelocation_id</th>

                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $sql1 = "SELECT * FROM customplace";
                        $q1 = mysqli_query($conn, $sql1);
                        while ($row = mysqli_fetch_array($q1)) {

                            echo "<tr>";
                            echo "<td>" . $row['Customplace_id'] . "</td>";
                            echo "<td>" . $row['Province_id'] . "</td>";
                            echo "<td>" . $row['Customplace_longitude'] . "</td>";
                            echo "<td>" . $row['Customplace_latitude'] . "</td>";
                            echo "<td>" . $row['Customplace_detail'] . "</td>";
                            echo "<td>" . $row['Custom_id'] . "</td>";
                            echo "<td>" . $row['Typelocation_id'] . "</td>";
                            echo '<td style="text-align: center"> <a href="?amallplace&search=tl02&edit&Customplace_id=' . $row['Customplace_id'] . '" class="btn btn-warning btn-sm float-end"><i class="fas fa-pencil-alt"></i></a> </td>';
                            echo "<td style='text-align: center'> <a href='?amallplace&search=tl02&del&Customplace_id=" . $row['Customplace_id'] . "' onclick=\"return confirm('ต้องการลบรายการนี้ใช่หรือไม่?')\" class='btn btn-danger btn-sm float-end'><i class='fas fa-trash'></i></a> </td>";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php } ?>