<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/DanhMucController.php';
require_once './models/DanhMuc.php';

// lien he
require_once './controllers/LienHeContronller.php';
require_once './models/lienHe.php';
// người dùng
require_once './controllers/NguoiDungController.php';
require_once './models/NguoiDung.php';

// Require toàn bộ file Models

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    '/'                          => (new DashboardController())->index(),
    // quản lý danh mục sp
    'danh-mucs'                  => (new DanhMucController())->index(),
    'from-them-danh-muc'         => (new DanhMucController())->create(),
    'them-danh-muc'              => (new DanhMucController())->store(),
    'form-sua-danh-muc'          => (new DanhMucController())->edit(),
    'sua-danh-muc'               => (new DanhMucController())->update(),
    'xoa-danh-muc'               => (new DanhMucController())->destroy(),

    // quản lý Liên Hệ
    'lien-he'                    => (new LienHeController())->index(),
    'from-them-lien-he'          => (new LienHeController())->create(),
    'them-lien-he'               => (new LienHeController())->store(),
    'form-sua-lien-he'           => (new LienHeController())->edit(),
    'sua-lien-he'                => (new LienHeController())->update(),
    'xoa-lien-he'                => (new LienHeController())->destroy(),

    // quản lý người dùng
    'nguoi-dung'                    => (new nguoiDungController())->index(),
    'from-them-nguoi-dung'          => (new nguoiDungController())->create(),
    'them-nguoi-dung'               => (new nguoiDungController())->store(),
    'form-sua-nguoi-dung'           => (new nguoiDungController())->edit(),
    'sua-nguoi-dung'                => (new nguoiDungController())->update(),
    'xoa-nguoi-dung'                => (new nguoiDungController())->destroy(),

      // quản lý tin tức
      // 'tin-tuc'                    => (new TintucController())->index(),
      // 'from-them-tin-tuc'          => (new TintucController())->create(),
      // 'them-tin-tuc'               => (new TintucController())->store(),
      // 'form-sua-tin-tuc'           => (new TintucController())->edit(),
      // 'sua-tin-tuc'                => (new TintucController())->update(),
      // 'xoa-tin-tuc'                => (new TintucController())->destroy(),
};