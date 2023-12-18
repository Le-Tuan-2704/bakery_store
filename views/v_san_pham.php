

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
    <div class="d-flex flex-row-reverse">
        <!-- Nút để mở Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
            Thêm Sản Phẩm
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content px-4">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm Sản Phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form nhập thông tin sản phẩm -->
                        <form id="addProductForm" enctype="multipart/form-data" action="" method="post">
                            <input type="hidden" class="form-control" name="action" value="them_sp">
                            <div class="row">
                                <div class="col-xl-6">
                                    <!-- Các trường thông tin sản phẩm -->
                                    <div class="form-group">
                                        <label for="ten_san_pham">Tên Sản Phẩm:</label>
                                        <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="ma_chu_de">Chủ Đề:</label>
                                        <select class="form-control" id="ma_chu_de" name="ma_chu_de" required>
                                        <?php foreach ($chu_de as $row) : ?>
                                            <option value="<?php echo $row->ma_chu_de ?>"><?php echo $row->ten_chu_de ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="ma_khuyen_mai">Khuyến Mãi:</label>
                                        <select class="form-control" id="ma_khuyen_mai" name="ma_khuyen_mai" required>
                                            <?php foreach ($khuyen_mai as $row) : ?>
                                            <option value="<?php echo $row->ma_khuyen_mai ?>"><?php echo $row->ten_khuyen_mai ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="so_luong">Số lượng:</label>
                                        <input type="text" class="form-control" id="so_luong" name="so_luong" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="don_gia">Đơn giá:</label>
                                        <input type="text" class="form-control" id="don_gia" name="don_gia" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="hinh_anh">Hình Ảnh:</label>
                                        <input type="file" class="form-control-file" id="hinh_anh" name="hinh_anh" required>
                                    </div>

                                    <!-- Thêm các trường khác tương tự -->
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class = "col-xl-12">
                                    <div class="form-group">
                                        <label for="noi_dung_tom_tat">Nội dung tóm tắt:</label>
                                        <textarea class="form-control" id="noi_dung_tom_tat" name="noi_dung_tom_tat" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class = "col-xl-12">
                                    <div class="form-group">
                                        <label for="noi_dung_chi_tiet">Nội dung chi tiết:</label>
                                        <textarea class="form-control" id="noi_dung_chi_tiet" name="noi_dung_chi_tiet" rows="3" required></textarea>
                                    </div>
                                </div>
                                
                            </div>
                                
                            <!-- Nút submit để thêm sản phẩm -->
                            <button type="submit" class="btn btn-primary mx-auto">Thêm Sản Phẩm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
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
                            <?php echo $row->ten_khuyen_mai ?>
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
                  <div class="col-md-4 mb-4" id="sanpham_<?php echo $row->ma_san_pham; ?>">
                      <div class="card">
                          <a href="chitiet_sp.php?ma_san_pham=<?php echo $row->ma_san_pham; ?>">
                            <div class="custom-image-container">
                                <img class="card-img-top custom-img" style="height: 190px;" src="public/images/<?php echo $row->hinh_anh; ?>" alt="<?php echo $row->ten_san_pham; ?>">
                            </div>
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
                                  <?php
                                    if (isset($_SESSION["vai_tro"]) && $_SESSION["vai_tro"] == "khach") {
                                        // Nếu vai_tro là "khach", hiển thị nút với icon giỏ hàng
                                        echo '<button class="btn btn-primary item_add items" style="margin:0px 0px 0px 17px;"  onclick="chonmua(' . $row->ma_san_pham . ')"><i class="fas fa-shopping-cart"></i></button>';
                                    } else {
                                        // Nếu vai_tro không phải là "khach", hiển thị nút với icon sửa
                                        echo '<button class="btn btn-primary item_add items" style="margin:0px 0px 0px 17px;" onclick="sua_san_pham(' . $row->ma_san_pham . ')"><i class="fas fa-edit"></i></button>';
                                    }
                                    ?>
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