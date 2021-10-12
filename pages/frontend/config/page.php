<?php 

if(isset($_GET['page'])) {
    $page = $_GET['page'];

    switch($page) {
        case 'about':
            include 'pages/frontend/pages/about.php';
            break;
        case 'dosen':
                include 'pages/frontend/pages/dosen.php';
                break;
        case 'kontak':
                include 'pages/frontend/pages/kontak.php';
                break;
        case 'produk':
                include 'pages/frontend/pages/produk.php';
                break;
        case 'blog':
                include 'pages/frontend/pages/blog.php';
                break;
        case 'blog-single':
                include 'pages/frontend/pages/blog-single.php';
                break;

    }

} else {
    include "pages/frontend/pages/home.php";
}


?>