<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">เครื่องแต่งกาย</h1>

<?php if (isset($_GET['add'])) { ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">เพิ่มข้อมูล เครื่องแต่งกาย</h6>

        </div>

        <div class="card-body">

            <form action="?amclothes&add_db" method="post">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">รหัสเครื่องแต่งกาย</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="Clothes_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label"> Ethnic_id</label>
                    <input type="text" class="form-control" id="exampleFormControlInput4" name="Ethnic_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" id="exampleFormControlInput5" name="Clothes_name" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="Clothes_detail" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" onclick="history.back()">Cancle</a>
            </form>

        </div>

    </div>

    <?php } elseif (isset($_GET['edit'])) {

    if (isset($_GET['Clothes_id'])) {

        $Clothes_id = $_GET['Clothes_id'];

        $sql1 = "SELECT * FROM clothes WHERE Clothes_id = '$Clothes_id' ";
        $q1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_array($q1);

    ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">แก้ไขข้อมูล เครื่องแต่งกาย</h6>

            </div>

            <div class="card-body">

                <form action="?amclothes&edit_db" method="post">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">รหัสเครื่องแต่งกาย</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="Clothes_id" value="<?php echo $row['Clothes_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label"> Ethnic_id</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" name="Ethnic_id" value="<?php echo $row['Ethnic_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput5" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="exampleFormControlInput5" name="Clothes_name" value="<?php echo $row['Clothes_name'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="Clothes_detail" required><?php echo $row['Clothes_detail'] ?></textarea>
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

    if (isset($_POST['Clothes_id'])) {

        $Clothes_id = $_POST["Clothes_id"];
        $Clothes_name = $_POST["Clothes_name"];
        $Clothes_detail = $_POST["Clothes_detail"];
        $Ethnic_id = $_POST["Ethnic_id"];

        $strSQL = "INSERT INTO clothes
        values ('" . $Clothes_id . "','" . $Clothes_name . "','" . $Clothes_detail . "',
                '" . $Ethnic_id . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?amclothes';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?amclothes';
              </script>";
        }
    }

    //แก้ไข db
} elseif (isset($_GET['edit_db'])) {

    if (isset($_POST['Clothes_id'])) {

        $strSQL = "update clothes set Clothes_id = '" . $_POST['Clothes_id'] . "'
        , Clothes_name =  '" . $_POST['Clothes_name'] . "'
        , Clothes_detail =  '" . $_POST['Clothes_detail'] . "'
        , Ethnic_id =  '" . $_POST['Ethnic_id'] . "'
        where Clothes_id IN ('" . $_POST['Clothes_id'] . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?amclothes';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?amclothes';
              </script>";
        }
    }

    //ลบ
} elseif (isset($_GET['del'])) {

    if (isset($_GET['Clothes_id'])) {

        $Clothes_id = $_GET['Clothes_id'];

        $sql = "DELETE FROM clothes WHERE Clothes_id ='$Clothes_id'";

        if (mysqli_query($conn, $sql) == TRUE) {

            echo "<script>
            alert('ลบสำเร็จ');
            window.location.href = 'index.php?amclothes';
            </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?amclothes';
            </script>";
        }
    }
} else {

    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <a href="?amclothes&add" class="btn btn-success btn-circle float-end">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Clothes_id</th>
                            <th>ชื่อ</th>
                            <th>รายละเอียด</th>
                            <th>Ethnic_id</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $sql1 = "SELECT * FROM clothes  ";
                        $q1 = mysqli_query($conn, $sql1);
                        while ($row = mysqli_fetch_array($q1)) {

                            echo "<tr>";
                            echo "<td>" . $row['Clothes_id'] . "</td>";
                            echo "<td>" . $row['Clothes_name'] . "</td>";
                            echo "<td>" . $row['Clothes_detail'] . "</td>";
                            echo "<td>" . $row['Ethnic_id'] . "</td>";
                            echo '<td style="text-align: center"> <a href="?amclothes&edit&Clothes_id=' . $row['Clothes_id'] . '" class="btn btn-warning btn-sm float-end"><i class="fas fa-pencil-alt"></i></a> </td>';
                            echo "<td style='text-align: center'> <a href='?amclothes&del&Clothes_id=" . $row['Clothes_id'] . "' onclick=\"return confirm('ต้องการลบรายการนี้ใช่หรือไม่?')\" class='btn btn-danger btn-sm float-end'><i class='fas fa-trash'></i></a> </td>";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php } ?>