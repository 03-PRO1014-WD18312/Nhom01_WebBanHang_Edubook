<?php include "views/layout/admin/Header.php";
?>
<div class="container">
    <div class=" text">
        Thêm Bộ truyện
    </div>
    <form action="index.php?controller=boTruyen_fix" method="post" enctype="multipart/form-data" style="min-height: 500px;">
        <?php foreach ($list as $key => $vl) { ?>
            <input type="hidden" name="id" value="<?php echo $vl->id ?>">
            <div class=" form-row">
                <div class="input-data">
                    <input type="text" name="ten" value="<?php echo $vl->ten ?>" required>
                    <div class="underline"></div>
                    <label for="">Tên bộ truyện</label>
                </div>
            </div>
            <div class=" form-row">
                <div class="input-data">
                    <input type="number" name="giaban" value="<?php echo $vl->gia_ban ?>" required>
                    <div class="underline"></div>
                    <label for="">Giá bán</label>
                </div>
            </div>
            <div class=" form-row">
                <div class="input-data">
                    <input type="number" name="giagoc" value="<?php echo $vl->gia_goc ?>" required>
                    <div class="underline"></div>
                    <label for="">Giá gốc</label>
                </div>
            </div>
                <label for="">Mô tả</label>
                <div class="input-data">
                    <textarea name="mota" id="" cols="30" rows="5" style="width: 100%;"></textarea>
                </div>
                <div class=" form-row">
                <div class="input-data">
                <select name="loai" id="">
                        <?php foreach($loai as $key => $value){
                            if($value->id==$vl->id){
                        ?>
                            <option value="<?php echo $vl->id ?>"><?php echo $vl->ten ?></option>
                        <?php
                        } }
                        ?>
                        <?php foreach($loai as $key => $value){
                            if($value->id!=$vl->id){
                        ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->ten ?></option>
                        <?php
                        } }
                        ?>
                    </select>
                    <!-- <div class="underline"></div> -->
                    <label for="">Loại truyện</label>
                </div>
            </div>
            <img src="assets/imgs/shop/<?php echo $vl->img ?>" width="10%" alt="">
            <div class=" form-row">
                <div class="input-data">
                    <input type="file" name="img">
                    <div class="underline"></div>
                </div>
            </div>
            <div class=" form-row">
                <div class="input-data">
                    <select name="trang_thai" id="">
                        <?php if ($vl->trang_thai == 1) {
                        ?>
                            <option value="1">Hoạt động</option>
                            <option value="0">Dừng hoạt động</option>
                        <?php
                        } else {
                        ?>
                            <option value="0">Dừng hoạt động</option>
                            <option value="1">Hoạt động</option>
                        <?php
                        } ?>
                    </select>
                    <div class="underline"></div>
                    <label for="">Trạng thái</label>
                </div>
            </div>
        <?php } ?>
        <div class="form-row">
            <div class="input-data textarea">
                <div class="form-row submit-btn">
                    <div class="input-data">
                        <div class="inner"></div>
                        <input type="submit" value="submit">
                    </div>
                </div>
            </div>
    </form>
</div>
<!-- End of Main Content -->
<?php include "views/layout/admin/Footer.php"; ?>