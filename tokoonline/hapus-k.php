<?php 
    include 'db.php';

    if(isset($_GET['id'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_kategori WHERE kategori_id = '".$_GET['id']."' ");
        echo '<script>window.location="edit-kategori.php" </script>';
    }else{
        echo "gagal".mysqli_error($conn);
    }
    
    if(isset($_GET['idp'])){
        $produk = mysqli_query($conn, "SELECT description_image FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
        $p = mysqli_fetch_object($produk);

        unlink('./Produk/'.$p->description_image);
        
        
        $delete = mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
        echo '<script>window.location="prduk.php" </script>';
    }else{
        echo "gagal".mysqli_error($conn);
    }
?>