
<div class="product-model">
    
    <p align="right">Giỏ hàng của bạn:(<?php echo "$tongsl sản phẩm - Tổng thành tiền: " . number_format($tongDg) . " đồng" ?> )
      <?php
      if (isset($_SESSION["giohang"])) {
      ?>
        | <a href="gio_hang.php">Xem Giỏ Hàng</a> | <a href="xoa_gio_hang.php">Xóa Giỏ Hàng</a></p>
    <?php
        }
    ?>
    <br>
    <br>
    <div class="row">
      <div class="col-lg-3">
            <div class="product_right">
                <h4 class="mb-3"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Danh mục sản phẩm</h4>
                <div class="form-check">
                    <?php foreach ($chu_de as $row) : ?>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="chu_de" value="<?php echo $row->ma_chu_de ?>" onclick="Tim_san_pham_theo_chu_de()">
                            <?php echo $row->ten_chu_de ?>
                        </label>
                    <?php endforeach; ?>
                </div>

                <h4 class="mt-4"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Giảm giá</h4>
                <div class="form-check">
                    <?php foreach ($khuyen_mai as $row) : ?>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="chiet_khau" value="<?php echo $row->chiet_khau ?>" onclick="Tim_san_pham_theo_khuyen_mai()">
                            <?php echo $row->chiet_khau ?>
                        </label>
                    <?php endforeach; ?>
                </div>

                <h4 class="mt-4"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Hương vị</h4>
                <div class="form-check">
                    <?php foreach ($huong_vi as $row) : ?>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="huong_vi" onclick="Tim_san_pham_theo_huong_vi()" value="<?php echo $row->ten_huong_vi ?>">
                            <?php echo $row->ten_huong_vi; ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>
      </div>

      <div class="col-lg-9" id="hienthi">
          <h2 class="mb-4">Tất cả sản phẩm</h2>
          <div class="row">
              <?php foreach ($san_phams as $row) : ?>
                  <div class="col-md-4 mb-4">
                      <div class="card">
                          <a href="chitiet_sp.php?ma_san_pham=<?php echo $row->ma_san_pham; ?>">
                              <img class="card-img-top" src="public/images/<?php echo $row->hinh_anh; ?>" alt="<?php echo $row->ten_san_pham; ?>">
                          </a>
                          <div class="card-body">
                              <h5 class="card-title"><?php echo $row->ten_san_pham; ?></h5>
                              <span class="item_price"><?php echo number_format($row->don_gia - ($row->don_gia * $row->chiet_khau / 100)); ?>&nbsp;đồng</span>
                              <div class="ofr">
                                  <?php if ($row->chiet_khau != 0) : ?>
                                      <p class="pric1"><del><?php echo number_format($row->don_gia); ?>&nbsp;đồng</del></p>
                                      <p class="disc">[<?php echo $row->chiet_khau; ?>% Off]</p>
                                  <?php else : ?>
                                      <p class="pric1">&nbsp;</p>
                                      <p class="disc">&nbsp;</p>
                                  <?php endif; ?>
                              </div>
                              <div class="d-flex align-items-center justify-content-between">
                                  <div class="form-group mb-0">
                                      <input type="number" class="form-control item_quantity" value="1" name="sl_<?php echo $row->ma_san_pham ?>" id="sl_<?php echo $row->ma_san_pham ?>" />
                                  </div>
                                  <a href="javascript:void(0)" class="btn btn-primary item_add items" onclick="chonmua(<?php echo $row->ma_san_pham ?>)"><i class="fas fa-shopping-cart"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
          </div>
          <!-- danh sach -->
          <div class="clearfix mt-4">
              <ul class="pagination justify-content-center">
                  <?php echo $lst; ?>
              </ul>
          </div>

      </div>
    </div>
</div>