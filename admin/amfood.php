<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">อาหาร</h1>

<?php if (isset($_GET['add'])) { ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">เพิ่มข้อมูล อาหาร</h6>

        </div>

        <div class="card-body">

            <form action="?amfood&add_db" method="post">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">รหัสอาหาร</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="Food_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" id="exampleFormControlInput5" name="Food_name" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label"> Ethnic_id</label>
                    <input type="text" class="form-control" id="exampleFormControlInput2" name="Ethnic_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label"> Foodtype_id</label>
                    <input type="text" class="form-control" id="exampleFormControlInput4" name="Foodtype_id" autocomplete="off" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" onclick="history.back()">Cancle</a>
            </form>

        </div>

    </div>

    <?php } elseif (isset($_GET['edit'])) {

    if (isset($_GET['Food_id'])) {

        $Food_id = $_GET['Food_id'];

        $sql1 = "SELECT * FROM food WHERE Food_id = '$Food_id' ";
        $q1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_array($q1);

    ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">แก้ไขข้อมูล อาหาร</h6>

            </div>

            <div class="card-body">

                <form action="?amfood&edit_db" method="post">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">รหัสอาหาร</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="Food_id" value="<?php echo $row['Food_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput5" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="exampleFormControlInput5" name="Food_name" value="<?php echo $row['Food_name'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label"> Ethnic_id</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" name="Ethnic_id" value="<?php echo $row['Ethnic_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label"> Foodtype_id</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" name="Foodtype_id" value="<?php echo $row['Foodtype_id'] ?>" autocomplete="off" required>
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

    if (isset($_POST['Food_id'])) {

        $Food_id = $_POST["Food_id"];
        $Food_name = $_POST["Food_name"];
        $Ethnic_id = $_POST["Ethnic_id"];
        $Foodtype_id = $_POST["Foodtype_id"];

        $strSQL = "INSERT INTO food
        values ('" . $Food_id . "','" . $Food_name . "','" . $Ethnic_id . "',
                '" . $Foodtype_id . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?amfood';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?amfood';
              </script>";
        }
    }

    //แก้ไข db
} elseif (isset($_GET['edit_db'])) {

    if (isset($_POST['Food_id'])) {

        $strSQL = "update food set Food_id = '" . $_POST['Food_id'] . "'
        , Food_name =  '" . $_POST['Food_name'] . "'
        , Ethnic_id =  '" . $_POST['Ethnic_id'] . "'
        , Foodtype_id =  '" . $_POST['Foodtype_id'] . "'
        where Food_id IN ('" . $_POST['Food_id'] . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?amfood';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?amfood';
              </script>";
        }
    }

    //ลบ
} elseif (isset($_GET['del'])) {

    if (isset($_GET['Food_id'])) {

        $Food_id = $_GET['Food_id'];

        $sql = "DELETE FROM food WHERE Food_id ='$Food_id'";

        if (mysqli_query($conn, $sql) == TRUE) {

            echo "<script>
            alert('ลบสำเร็จ');
            window.location.href = 'index.php?amfood';
            </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?amfood';
            </script>";
        }
    }
} else {

    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <a href="?amfood&add" class="btn btn-success btn-circle float-end">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Food_id</th>
                            <th>ชื่ออาหาร</th>
                            <th>Ethnic_id</th>
                            <th>Foodtype_id</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $sql1 = "SELECT * FROM food";
                        $q1 = mysqli_query($conn, $sql1);
                        while ($row = mysqli_fetch_array($q1)) {

                            echo "<tr>";
                            echo "<td>" . $row['Food_id'] . "</td>";
                            echo "<td>" . $row['Food_name'] . "</td>";
                            echo "<td>" . $row['Ethnic_id'] . "</td>";
                            echo "<td>" . $row['Foodtype_id'] . "</td>";
                            echo '<td style="text-align: center"> <a href="?amfood&edit&Food_id=' . $row['Food_id'] . '" class="btn btn-warning btn-sm float-end"><i class="fas fa-pencil-alt"></i></a> </td>';
                            echo "<td style='text-align: center'> <a href='?amfood&del&Food_id=" . $row['Food_id'] . "' onclick=\"return confirm('ต้องการลบรายการนี้ใช่หรือไม่?')\" class='btn btn-danger btn-sm float-end'><i class='fas fa-trash'></i></a> </td>";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php } ?>