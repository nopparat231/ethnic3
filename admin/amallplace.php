<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">สถานที่</h1>

<div class="card mb-4">
    <div class="card-header">
        ประเภทสถานที่
    </div>
    <div class="card-body" style="text-align: center">

        <form action="?amallplace" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">

                <select class="form-select" aria-label="Default select example" style="width: 15rem;" name="search">
                    <option value="TL01">ร้านอาหาร</option>
                    <option value="TL02">วัฒนธรรมและประเพณี</option>
                    <option value="TL03">แหล่งที่เหลืออยู่</option>
                    <option value="TL04">ร้านเครื่องแต่งกาย</option>
                    <option value="TL05">สถานที่ท่องเที่ยว/พิพิธพันธุ์</option>
                </select>

                <input type="hidden" name="amallplace" value="amallplace">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        เพิ่ม ลบ แก้ไข
    </div>
    <div class="card-body">
        <h2>Test : <?php echo isset($_GET['search']) ? $_GET['search'] : "" ?></h2>
    </div>
</div>