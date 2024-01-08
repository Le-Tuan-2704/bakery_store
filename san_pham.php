<?php
ini_set("display_errors",1);
include("controllers/c_san_pham.php");
$c_san_pham=new C_san_pham();
session_start();


if (isset($_POST["action"]) && $_POST["action"] == "them_sp") {
    // Kiểm tra xem tập tin hình ảnh đã được tải lên chưa
    if(isset($_FILES["hinh_anh"]) && $_FILES["hinh_anh"]["error"] == 0) {
        
        $ten_chu_de = '';
		switch ($_POST["ma_chu_de"]) {
			case '1':
				$ten_chu_de = 'banhcuoi';
				break;
			case '2':
				$ten_chu_de = 'banhsinhnhat';
				break;
			case '3':
				$ten_chu_de = 'banhletiec';
				break;
			case '4':
				$ten_chu_de = 'banhkhac';
				break;
			
			default:
				# code...
				break;
		}

        // Kiểm tra kích thước file
        if ($_FILES["hinh_anh"]["size"] > 500000) {
            echo "Xin lỗi, file quá lớn.";
            return;
        }

        // Cho phép chỉ các định dạng file hình ảnh
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        $imageFileType = strtolower(pathinfo($_FILES["hinh_anh"]["name"], PATHINFO_EXTENSION));

        if (!in_array($imageFileType, $allowedExtensions)) {
            echo "Xin lỗi, chỉ chấp nhận file JPG, JPEG, PNG & GIF.";
            return;
        }

        // Tạo thư mục để lưu trữ hình ảnh nếu nó chưa tồn tại
        $uploadDir = "public/images/".$ten_chu_de."/"; // Thay đổi đường dẫn tùy thuộc vào cấu trúc thư mục của bạn


        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Tạo tên tập tin ngẫu nhiên để tránh trùng lặp
        // $randomFileName = uniqid() . '_' . $_FILES["hinh_anh"]["name"];
        $randomFileName = $_FILES["hinh_anh"]["name"];
        
        // Đường dẫn tập tin lưu trữ
        $uploadPath = $uploadDir . $randomFileName;

        // Di chuyển tập tin tải lên vào thư mục lưu trữ
        if(move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $uploadPath)) {
            // Gọi hàm thêm sản phẩm với đường dẫn hình ảnh đã lưu
            $c_san_pham->Them_sp($_POST["ten_san_pham"], $_POST["ma_chu_de"], $_POST["ma_khuyen_mai"], $_POST["so_luong"], $_POST["don_gia"], $ten_chu_de."/".$randomFileName, $_POST["noi_dung_tom_tat"], $_POST["noi_dung_chi_tiet"]);
            
        } else {
            // Có lỗi khi di chuyển tập tin
            echo "Có lỗi xảy ra khi di chuyển tập tin.";
        }
    } else {
        // Hình ảnh không được tải lên hoặc có lỗi
        echo "Hình ảnh không được tải lên hoặc có lỗi.";
    }

    return;
}

if (isset($_POST["action"]) && $_POST["action"] == "sua_sp") {
    $hinh_anh = '';
    // Kiểm tra xem tập tin hình ảnh đã được tải lên chưa
    if(isset($_FILES["hinh_anh"]) && $_FILES["hinh_anh"]["error"] == 0) {
        
        $ten_chu_de = '';
		switch ($_POST["ma_chu_de"]) {
			case '1':
				$ten_chu_de = 'banhcuoi';
				break;
			case '2':
				$ten_chu_de = 'banhsinhnhat';
				break;
			case '3':
				$ten_chu_de = 'banhletiec';
				break;
			case '4':
				$ten_chu_de = 'banhkhac';
				break;
			
			default:
				# code...
				break;
		}

        // Kiểm tra kích thước file
        if ($_FILES["hinh_anh"]["size"] > 500000) {
            echo "Xin lỗi, file quá lớn.";
            return;
        }

        // Cho phép chỉ các định dạng file hình ảnh
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        $imageFileType = strtolower(pathinfo($_FILES["hinh_anh"]["name"], PATHINFO_EXTENSION));

        if (!in_array($imageFileType, $allowedExtensions)) {
            echo "Xin lỗi, chỉ chấp nhận file JPG, JPEG, PNG & GIF.";
            return;
        }

        // Tạo thư mục để lưu trữ hình ảnh nếu nó chưa tồn tại
        $uploadDir = "public/images/".$ten_chu_de."/"; // Thay đổi đường dẫn tùy thuộc vào cấu trúc thư mục của bạn


        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Tạo tên tập tin ngẫu nhiên để tránh trùng lặp
        // $randomFileName = uniqid() . '_' . $_FILES["hinh_anh"]["name"];
        $randomFileName = $_FILES["hinh_anh"]["name"];
        
        // Đường dẫn tập tin lưu trữ
        $uploadPath = $uploadDir . $randomFileName;

        // Di chuyển tập tin tải lên vào thư mục lưu trữ
        if(move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $uploadPath)) {
            $hinh_anh = $ten_chu_de."/".$randomFileName;
            
        } else {
            // Có lỗi khi di chuyển tập tin
            echo "Có lỗi xảy ra khi di chuyển tập tin.";
            return;
        }
    } else {
        $hinh_anh = $_POST["hinh_anh_cu"];
    }

    // Gọi hàm thêm sản phẩm với đường dẫn hình ảnh đã lưu
    $c_san_pham->Sua_sp($_POST["ma_san_pham"], $_POST["ten_san_pham"], $_POST["ma_chu_de"], $_POST["ma_khuyen_mai"], $_POST["so_luong"], $_POST["don_gia"], $hinh_anh, $_POST["noi_dung_tom_tat"], $_POST["noi_dung_chi_tiet"]);
    return;
}

if (isset($_POST["action"]) && $_POST["action"] == "view_sua_sp") {
    $res = $c_san_pham->Sua_sp();
    return;
}

$c_san_pham->Hien_thi_san_pham();
?>