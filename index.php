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
};
