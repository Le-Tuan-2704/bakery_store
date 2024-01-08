<?php
include("models/m_san_pham.php");
$gtChu_de=$_POST["gtChu_de"];
$m_chu_de=new M_san_pham();
$chu_des=$m_chu_de->Tim_san_pham_theo_chu_de($gtChu_de);
?>
<div class="row">
      <?php
      foreach($chu_des as $row)
	  {
	  ?>
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
                                        echo '<button class="btn btn-primary item_add items" style="margin:0px 0px 0px 17px;" data-toggle="modal" data-target="#editProductModal'.$row->ma_san_pham.'"><i class="fas fa-edit"></i></button>';
                                    }
                                    ?>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- Modal -->
                    <div class="modal fade" id="editProductModal<?php echo $row->ma_san_pham; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content px-4">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Sửa Sản Phẩm <strong><?php echo $row->ten_san_pham; ?></strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form nhập thông tin sản phẩm -->
                                    <form id="addProductForm" enctype="multipart/form-data" action="" method="post">
                                        <input type="hidden" class="form-control" name="action" value="sua_sp">
                                        <input type="hidden" class="form-control" name="ma_san_pham" value="<?php echo $row->ma_san_pham ?>">
                                        <input type="hidden" class="form-control" name="hinh_anh_cu" value="<?php echo $row->hinh_anh ?>">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!-- Các trường thông tin sản phẩm -->
                                                <div class="form-group">
                                                    <label for="ten_san_pham">Tên Sản Phẩm:</label>
                                                    <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham" value="<?php echo $row->ten_san_pham; ?>"  required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="ma_chu_de">Chủ Đề:</label>
                                                    <select class="form-control" id="ma_chu_de" name="ma_chu_de" value="<?php echo $row->ma_chu_de; ?>" required>
                                                    <?php foreach ($chu_de as $rowchu_de) : ?>
                                                        <option value="<?php echo $rowchu_de->ma_chu_de ?>"><?php echo $rowchu_de->ten_chu_de ?></option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="ma_khuyen_mai">Khuyến Mãi:</label>
                                                    <select class="form-control" id="ma_khuyen_mai" name="ma_khuyen_mai" value="<?php echo $row->ma_khuyen_mai; ?>" required>
                                                        <?php foreach ($khuyen_mai as $rowkhuyen_mai) : ?>
                                                        <option value="<?php echo $rowkhuyen_mai->ma_khuyen_mai ?>"><?php echo $rowkhuyen_mai->ten_khuyen_mai ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="so_luong">Số lượng:</label>
                                                    <input type="number" class="form-control" id="so_luong" name="so_luong" value="<?php echo $row->so_luong; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="don_gia">Đơn giá:</label>
                                                    <input type="number" class="form-control" id="don_gia" name="don_gia" value="<?php echo $row->don_gia; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="hinh_anh">Hình Ảnh hiện tại:</label>
                                                    <img src="public/images/<?php echo $row->hinh_anh; ?>" alt="Hình ảnh hiện tại" class="img-thumbnail" width="100">
                                                    <br>
                                                    <label for="hinh_anh">Chọn hình mới:</label>
                                                    <input type="file" class="form-control-file" id="hinh_anh" name="hinh_anh">
                                                </div>

                                                <!-- Thêm các trường khác tương tự -->
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class = "col-xl-12">
                                                <div class="form-group">
                                                    <label for="noi_dung_tom_tat">Nội dung tóm tắt:</label>
                                                    <textarea class="form-control" id="noi_dung_tom_tat" name="noi_dung_tom_tat" rows="3" required><?php echo $row->noi_dung_tom_tat; ?></textarea>
                                                </div>
                                            </div>
                                            <div class = "col-xl-12">
                                                <div class="form-group">
                                                    <label for="noi_dung_chi_tiet">Nội dung chi tiết:</label>
                                                    <textarea class="form-control" id="noi_dung_chi_tiet" name="noi_dung_chi_tiet" rows="3" required><?php echo $row->noi_dung_chi_tiet; ?></textarea>
                                                </div>
                                            </div>
                                            
                                        </div>
                                            
                                        <!-- Nút submit để thêm sản phẩm -->
                                        <button type="submit" class="btn btn-primary mx-auto">Sửa Sản Phẩm</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
      <?php
			}
		 ?>
    </div>
