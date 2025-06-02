<?php

$request = $_SERVER['REQUEST_URI'];
$viewDir = '/app/views/';
// $dbDir = '/app/db/';

switch ($request) {
    case '/home':
        require __DIR__ . $viewDir . 'landing.php';
        break;

    case '/login':
        require __DIR__ . $viewDir . 'auth/login.php';
        break;

    case '/menu':
        require __DIR__ . $viewDir . 'katalog/menu.php';
        break;

    case '/profile':
        require __DIR__ . $viewDir . 'profile.php';
        break;

    case '/keranjang':
        require __DIR__ . $viewDir . 'keranjang.php';
        break;

    case '/register':
        require __DIR__ . $viewDir . 'auth/register.php';
        break;

    case '/notifikasi':
        require __DIR__ . $viewDir . 'notifikasi.php';
        break;

    case '/voucher':
        require __DIR__ . $viewDir . 'voucher.php';
        break;

    case '/dashboard':
        require __DIR__ . $viewDir . 'dashboard/dashboard.php';
        break;
        
    case '/katalogmanage':
        require __DIR__ . $viewDir . 'dashboard/katalog/katalogmanage.php';
        break;

    case '/akun':
        require __DIR__ . $viewDir . 'dashboard/akun/akunmanage.php';
        break;

    case '/bahasa':
        require __DIR__ . $viewDir . 'bahasa.php';
        break; 
        
    case '/metodepembayaran':
        require __DIR__ . $viewDir . 'metodepembayaran.php';
        break;
        
    case '/pengaturanakun':
        require __DIR__ . $viewDir . 'pengaturanakun.php';
        break; 
        
    case '/alamat':
        require __DIR__ . $viewDir . 'alamat.php';
        break;

    case '/akunsosialmedia':
        require __DIR__ . $viewDir . 'akunsosialmedia.php';
        break;
        
    case '/keamanandanakun':
        require __DIR__ . $viewDir . 'keamanandanakun.php';
        break;    

    case '/riwayat':
        require __DIR__ . $viewDir . 'riwayat.php';
        break;
    
    case '/reservasi':
        require __DIR__ . $viewDir . 'reservasi.php';
        break;    

    case '/logout':
        require __DIR__ . $viewDir . 'auth/logout.php';
        break;    

    case '/akun/akun_edit':
        require __DIR__ . $viewDir . 'dashboard/akun/akun_edit.php';
        break;    

    case '/akun/akun_delete':
        require __DIR__ . $viewDir . 'dashboard/akun/akun_delete.php';
        break;    

    case '/katalogmanage/kategori_add':
        require __DIR__ . $viewDir . 'dashboard/katalog/kategori_tambah.php';
        break;  

    case '/katalogmanage/katalog_add':
        require __DIR__ . $viewDir . 'dashboard/katalog/katalog_tambah.php';
        break;   

    case '/katalogmanage/katalog_edit':
        require __DIR__ . $viewDir . 'dashboard/katalog/katalog_edit.php';
        break; 

    case '/katalogmanage/katalog_delete':
        require __DIR__ . $viewDir . 'dashboard/katalog/katalog_delete.php';
        break;   

    case '/couponmanage':
        require __DIR__ . $viewDir . 'dashboard/coupon/couponmanage.php';
        break;  

    case '/couponmanage/coupon_add':
        require __DIR__ . $viewDir . 'dashboard/coupon/coupon_tambah.php';
        break;   

    case '/couponmanage/coupon_edit':
        require __DIR__ . $viewDir . 'dashboard/coupon/coupon_edit.php';
        break;   

    case '/couponmanage/coupon_delete':
        require __DIR__ . $viewDir . 'dashboard/coupon/coupon_delete.php';
        break;    
        

    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}