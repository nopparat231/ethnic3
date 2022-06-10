<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">แหล่งที่เหลืออยู่</h1>

<?php if (isset($_GET['add'])) { ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">เพิ่มข้อมูล แหล่งที่เหลืออยู่</h6>

        </div>

        <div class="card-body">

            <form action="?amallplace&search=tl03&add_db" method="post">

                <div class="mb-3">
                    <label for="Ethnicplace_id" class="form-label">รหัสแหล่งที่เหลืออยู่</label>
                    <input type="text" class="form-control" id="Ethnicplace_id" name="Ethnicplace_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Ethnicplace_longitude" class="form-label">Ethnicplace_longitude</label>
                    <input type="text" class="form-control" id="Ethnicplace_longitude" name="Ethnicplace_longitude" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Ethnicplace_latitude" class="form-label"> Ethnicplace_latitude</label>
                    <input type="text" class="form-control" id="Ethnicplace_latitude" name="Ethnicplace_latitude" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Ethnic_id" class="form-label"> Ethnic_id</label>
                    <input type="text" class="form-control" id="Ethnic_id" name="Ethnic_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Province_id" class="form-label"> Province_id</label>
                    <input type="text" class="form-control" id="Province_id" name="Province_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Ethnicplace_detail" class="form-label"> Ethnicplace_detail</label>
                    <input type="text" class="form-control" id="Ethnicplace_detail" name="Ethnicplace_detail" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Typelocation_id" class="form-label"> Typelocation_id</label>
                    <input type="text" class="form-control" id="Typelocation_id" name="Typelocation_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Ethnicplace_name" class="form-label"> Ethnicplace_name</label>
                    <input type="text" class="form-control" id="Ethnicplace_name" name="Ethnicplace_name" autocomplete="off" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" onclick="history.back()">Cancle</a>
            </form>

        </div>

    </div>

    <?php } elseif (isset($_GET['edit'])) {

    if (isset($_GET['Ethnicplace_id'])) {

        $Ethnicplace_id = $_GET['Ethnicplace_id'];

        $sql1 = "SELECT * FROM ethnicplace WHERE Ethnicplace_id = '$Ethnicplace_id' ";
        $q1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_array($q1);

    ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">แก้ไขข้อมูล แหล่งที่เหลืออยู่</h6>

            </div>

            <div class="card-body">

                <form action="?amallplace&search=tl03&edit_db" method="post">

                    <div class="mb-3">
                        <label for="Ethnicplace_id" class="form-label">รหัสแหล่งที่เหลืออยู่</label>
                        <input type="text" class="form-control" id="Ethnicplace_id" name="Ethnicplace_id" value="<?php echo $row['Ethnicplace_id'] ?>" autocomplete="off" required readonly>
                    </div>

                    <div class="mb-3">
                        <label for="Ethnicplace_longitude" class="form-label">Ethnicplace_longitude</label>
                        <input type="text" class="form-control" id="Ethnicplace_longitude" name="Ethnicplace_longitude" value="<?php echo $row['Ethnicplace_longitude'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Ethnicplace_latitude" class="form-label"> Ethnicplace_latitude</label>
                        <input type="text" class="form-control" id="Ethnicplace_latitude" name="Ethnicplace_latitude" value="<?php echo $row['Ethnicplace_latitude'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Ethnic_id" class="form-label"> Ethnic_id</label>
                        <input type="text" class="form-control" id="Ethnic_id" name="Ethnic_id" value="<?php echo $row['Ethnic_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Province_id" class="form-label"> Province_id</label>
                        <input type="text" class="form-control" id="Province_id" name="Province_id" value="<?php echo $row['Province_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Ethnicplace_detail" class="form-label"> Ethnicplace_detail</label>
                        <input type="text" class="form-control" id="Ethnicplace_detail" name="Ethnicplace_detail" value="<?php echo $row['Ethnicplace_detail'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Typelocation_id" class="form-label"> Typelocation_id</label>
                        <input type="text" class="form-control" id="Typelocation_id" name="Typelocation_id" value="<?php echo $row['Typelocation_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Ethnicplace_name" class="form-label"> Ethnicplace_name</label>
                        <input type="text" class="form-control" id="Ethnicplace_name" name="Ethnicplace_name" value="<?php echo $row['Ethnicplace_name'] ?>" autocomplete="off" required>
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

    if (isset($_POST['Ethnicplace_id'])) {

        $Ethnicplace_id = $_POST["Ethnicplace_id"];
        $Ethnicplace_longitude = $_POST["Ethnicplace_longitude"];
        $Ethnicplace_latitude = $_POST["Ethnicplace_latitude"];
        $Ethnic_id = $_POST["Ethnic_id"];
        $Province_id = $_POST["Province_id"];
        $Ethnicplace_detail = $_POST["Ethnicplace_detail"];
        $Typelocation_id = $_POST["Typelocation_id"];
        $Ethnicplace_name = $_POST["Ethnicplace_name"];

        $strSQL = "INSERT INTO ethnicplace
        values ('" . $Ethnicplace_id . "',
                '" . $Ethnicplace_longitude . "',
                '" . $Ethnicplace_latitude . "',
                '" . $Ethnic_id . "',
                '" . $Province_id . "',
                '" . $Ethnicplace_detail . "',
                '" . $Typelocation_id . "',
                '" . $Ethnicplace_name . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?search=tl03&amallplace';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?search=tl03&amallplace';
              </script>";
        }
    }

    //แก้ไข db
} elseif (isset($_GET['edit_db'])) {

    if (isset($_POST['Ethnicplace_id'])) {

        $strSQL = "update ethnicplace set Ethnicplace_id = '" . $_POST['Ethnicplace_id'] . "'
        , Ethnicplace_longitude =  '" . $_POST['Ethnicplace_longitude'] . "'
        , Ethnicplace_latitude =  '" . $_POST['Ethnicplace_latitude'] . "'
        , Ethnic_id =  '" . $_POST['Ethnic_id'] . "'
        , Province_id =  '" . $_POST['Province_id'] . "'
        , Ethnicplace_detail =  '" . $_POST['Ethnicplace_detail'] . "'
        , Typelocation_id =  '" . $_POST['Typelocation_id'] . "'
        , Ethnicplace_name =  '" . $_POST['Ethnicplace_name'] . "'
        where Ethnicplace_id IN ('" . $_POST['Ethnicplace_id'] . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?search=tl03&amallplace';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?search=tl03&amallplace';
              </script>";
        }
    }

    //ลบ
} elseif (isset($_GET['del'])) {

    if (isset($_GET['Ethnicplace_id'])) {

        $Ethnicplace_id = $_GET['Ethnicplace_id'];

        $sql = "DELETE FROM ethnicplace WHERE Ethnicplace_id ='$Ethnicplace_id'";

        if (mysqli_query($conn, $sql) == TRUE) {

            echo "<script>
            alert('ลบสำเร็จ');
            window.location.href = 'index.php?search=tl03&amallplace';
            </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?search=tl03&amallplace';
            </script>";
        }
    }
} else {

    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <a href="?amallplace&search=tl03&add" class="btn btn-success btn-circle float-end">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>รหัสแหล่งที่เหลืออยู่</th>
                            <th>Ethnicplace_longitude</th>
                            <th>Ethnicplace_latitude</th>
                            <th>Ethnic_id</th>
                            <th>Province_id</th>
                            <th>Ethnicplace_detail</th>
                            <th>Typelocation_id</th>
                            <th>Ethnicplace_name</th>

                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $sql1 = "SELECT * FROM ethnicplace";
                        $q1 = mysqli_query($conn, $sql1);
                        while ($row = mysqli_fetch_array($q1)) {

                            echo "<tr>";
                            echo "<td>" . $row['Ethnicplace_id'] . "</td>";
                            echo "<td>" . $row['Ethnicplace_longitude'] . "</td>";
                            echo "<td>" . $row['Ethnicplace_latitude'] . "</td>";
                            echo "<td>" . $row['Ethnic_id'] . "</td>";
                            echo "<td>" . $row['Province_id'] . "</td>";
                            echo "<td>" . $row['Ethnicplace_detail'] . "</td>";
                            echo "<td>" . $row['Typelocation_id'] . "</td>";
                            echo "<td>" . $row['Ethnicplace_name'] . "</td>";
                            echo '<td style="text-align: center"> <a href="?amallplace&search=tl03&edit&Ethnicplace_id=' . $row['Ethnicplace_id'] . '" class="btn btn-warning btn-sm float-end"><i class="fas fa-pencil-alt"></i></a> </td>';
                            echo "<td style='text-align: center'> <a href='?amallplace&search=tl03&del&Ethnicplace_id=" . $row['Ethnicplace_id'] . "' onclick=\"return confirm('ต้องการลบรายการนี้ใช่หรือไม่?')\" class='btn btn-danger btn-sm float-end'><i class='fas fa-trash'></i></a> </td>";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php } ?>