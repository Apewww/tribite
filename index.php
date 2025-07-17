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
        require __DIR__ . $viewDir . 'profile/profile.php';
        break;

    case 'profile/upload_foto':
        require __DIR__ . $viewDir . 'profile/upload_foto.php';
        break;

    case 'profile/hapus_foto':
        require __DIR__ . $viewDir . 'profile/hapus_foto.php';
        break;

    case '/profile/settings/pengaturanakun':
        require __DIR__ . $viewDir . 'profile/settings/pengaturanakun.php';
        break; 

    case '/profile/settings/keamanandanakun':
        require __DIR__ . $viewDir . 'profile/settings/keamanandanakun/keamanandanakun.php';
        break;    

    case '/profile/settings/changeusername':
        require __DIR__ . $viewDir . 'profile/settings/keamanandanakun/changeusername.php';
        break;   

    case '/profile/settings/changetelp':
        require __DIR__ . $viewDir . 'profile/settings/keamanandanakun/changetelp.php';
        break;  

    case '/profile/settings/changeemail':
        require __DIR__ . $viewDir . 'profile/settings/keamanandanakun/changeemail.php';
        break;  

    case '/profile/settings/changepassword':
        require __DIR__ . $viewDir . 'profile/settings/keamanandanakun/hangepassword.php';
        break;    

    case '/profile/alamat':
        require __DIR__ . $viewDir . 'profile/settings/alamatsaya/viewalamat.php';
        break;

    case '/profile/settings/alamatsaya':
        require __DIR__ . $viewDir . 'profile/settings/alamatsaya/alamat.php';
        break;

    case '/profile/settings/alamatsaya/changealamat':
        require __DIR__ . $viewDir . 'profile/settings/alamatsaya/changealamat.php';
        break;

    case '/menu/keranjang':
        require __DIR__ . $viewDir . 'katalog/keranjang.php';
        break;

    case '/menu/keranjang/checkout':
        require __DIR__ . $viewDir . 'katalog/checkout.php';
        break;


    case '/register':
        require __DIR__ . $viewDir . 'auth/register.php';
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
        

    case '/akunsosialmedia':
        require __DIR__ . $viewDir . 'akunsosialmedia.php';
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
    
    case '/harian':
        require __DIR__ . $viewDir . 'harian.php';
        break;

    case '/proses_absen':
        require __DIR__ . $viewDir . 'proses_absen.php';
        break;
    
    case '/reservasimenu':
        require __DIR__ . $viewDir . 'reservasimenu.php';
        break;
    
    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}