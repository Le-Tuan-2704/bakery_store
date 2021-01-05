<div class="container">
  <h3 style="font-family: Arial, Helvetica, sans-serif;">Sản phẩm khuyến mãi</h3>
  <div class="items-sec">
    <?php
    foreach ($ma_khuyen_mai as $km) {
      $hide = "visibility:hidden";
    ?>
      <div class="col-md-3 feature-grid"> <a href="san_pham"><img src="public/images/<?php echo $km->hinh_anh; ?>" alt="" /> </a>
        <div class="arrival-info">
          <p><?php
              echo $km->ten_san_pham;
              ?></p>
          <?php
          if ($km->chiet_khau != 0) {
          ?>
            <span class="pric1"><del><?php echo number_format($km->don_gia); ?>&nbsp;đồng</del></span> <span class="disc" style="<?php ($km->chiet_khau == 0) ? $hide : ""; ?>">[<?php echo $km->chiet_khau; ?>% Off]</span></br>
          <?php
          }
          ?>
          <span class="pric1" style="color: #f00"><?php echo number_format($km->don_gia - ($km->don_gia * $km->chiet_khau / 100)); ?>&nbsp;đồng</span>
        </div>
        <div class="viw"> <a href="san_pham"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Xem thêm</a> </div>
        </a>
      </div>
    <?php
    }
    ?>
    <div class="clearfix"></div>
  </div>
  <h3 style="font-family: Arial, Helvetica, sans-serif;">Sản phẩm mới nhất</h3>
  <?php
  foreach ($ngay_them_san_pham as $ngay_them) {
    $hide = "style='visibility:hidden'";
  ?>
    <div class="col-md-3 feature-grid"> <a href="san_pham"><img src="public/images/<?php echo $ngay_them->hinh_anh; ?>" alt="" /> </a>
      <div class="arrival-info">
        <p><?php echo $ngay_them->ten_san_pham; ?></p>
        <?php
        if ($ngay_them->chiet_khau != 0) {
        ?>
          <span class="pric1"><del><?php echo number_format($ngay_them->don_gia); ?>&nbsp;đồng</del></span> <span class="disc">[<?php echo $ngay_them->chiet_khau; ?>% Off]</span></br>
        <?php
        } ?>
        <span class="pric1" style="color: #f00"><?php echo number_format($ngay_them->don_gia - ($ngay_them->don_gia * $ngay_them->chiet_khau / 100)); ?>&nbsp;đồng</span>
      </div>
      <div class="viw"> <a href="san_pham"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Xem thêm</a> </div>
      </a>
    </div>
  <?php
  }
  ?>
  <div class="clearfix"></div>
</div>