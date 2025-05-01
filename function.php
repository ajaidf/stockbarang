<?php
session_start();

$conn = mysqli_connect("localhost","root","","stockbarang");

//tambah barang
if(isset($_POST['tambah'])){
    $barang = $_POST['barang'];
    $tipe = $_POST['tipe'];
    $codebarang = $_POST['codebarang'];
    $deskripsi = $_POST['deskripsi'];
    $stock  = $_POST['stock'];

    $addtotable = mysqli_query($conn,"insert into stock (barang, tipe, codebarang, deskripsi, stock) values('$barang','$tipe','$codebarang','$deskripsi','$stock')");
    if($addtotable){
        header('location:index.php');
    } else {
        echo 'gagal';
        header('location:index.php');
    }
};

//Barang Masuk
if(isset($_POST['tambahmasuk'])){
    $barang = $_POST['barang'];
    $codebarang = $_POST['codebarang'];
    $qty  = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn,"select * from stock where codebarang='$codebarang'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambah = $stocksekarang+$qty;

    $addtomasuk = mysqli_query($conn,"insert into masuk (barang, codebarang, qty) values('$barang','$codebarang','$qty')");
    $updatestockmasuk = mysqli_query($conn,"update stock set stock= '$tambah' where codebarang= '$codebarang'");
    if($addtomasuk&&$updatestockmasuk){
        header('location:masuk.php');
    } else {
        echo 'gagal';
        header('location:masuk.php');
    }
};


// barang KELUAR
if(isset($_POST['kurang'])){
    $barang = $_POST['barang'];
    $codebarang = $_POST['codebarang'];
    $penerima = $_POST['penerima'];
    $departemen = $_POST['departemen'];
    $qty  = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn,"select * from stock where codebarang='$codebarang'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $kurang = $stocksekarang-$qty;

    $addtokeluar = mysqli_query($conn,"insert into keluar (barang, codebarang, penerima, departemen, qty) values('$barang', '$codebarang','$penerima', '$departemen', '$qty')");
    $updatestockkeluar = mysqli_query($conn,"update stock set stock= '$kurang' where codebarang= '$codebarang'");
    if($addtokeluar&&$updatestockkeluar){
        header('location:keluar.php');
    } else {
        echo 'gagal';
        header('location:keluar.php');
    }
};


//Edit stock Barang
if(isset($_POST['editbarang'])){
    $barang = $_POST['barang'];
    $tipe = $_POST['tipe'];
    $codebarang = $_POST['codebarang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];


    $edit = mysqli_query($conn, "update stock set barang='$barang', tipe='$tipe', deskripsi='$deskripsi', stock='$stock' where codebarang ='$codebarang'");
    if($edit){
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
};

//Hapus stock barang
if(isset($_POST['hapusbarang'])){
    $codebarang = $_POST['codebarang'];

    $hapus = mysqli_query($conn, "delete from stock where codebarang='$codebarang'");
    if($hapus){
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
};


//Edit barang masuk

if(isset($_POST['editbarangmasuk'])){
    $codebarang = $_POST['codebarang'];
    $idmasuk = $_POST['idmasuk'];
    $qty = $_POST['qty'];
    $lihatstock = mysqli_query($conn, "select * from stock where codebarang='$codebarang'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $qtynya['stock'];

    $qtyskrg = mysqli_query($conn, "select * from masuk where idmasuk ='$idmasuk'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    if($qty>$qtyskrg){
        $selisih = $qty+$qtyskrg;
        $kurangin = $stockskrg + $selisih;
        $kuranginstocknya = mysqli_query($conn, "update stock set stock='$kurangin' where codebarang='$codebarang'");
        $updatenya = mysqli_query($conn, "update masuk set  qty='$qty' where idmasuk='$idmasuk'");
        if($kuranginstocknya&&$updatenya){

        
                header('location:masuk.php'); 
            } else {
                echo 'Gagal';
                header('location:masuk.php');
                    }

        } else {
            $selisih = $qtyskrg-$qty;
            $kurangin = $stockskrg - $selisih;
            $kuranginstocknya = mysqli_query($conn, "update stock set stock='$kurangin' where codebarang='$codebarang'");
            $updatenya = mysqli_query($conn, "update masuk set  qty='$qty' where idmasuk='$idmasuk'");
                if($kuranginstocknya&&$updatenya){
                    header('location:masuk.php');
                } else {        
                     header('location:masuk.php');
                    
                }
    }
}


//hapus barang masuk
if(isset($_POST['hapusbarangmasuk'])){
    $idmasuk = $_POST['idmasuk'];
    $codebarang = $_POST['codebarang'];
    $qty = $_POST['kty'];

    $getdatastock = mysqli_query($conn, "select * from stock where codebarang='$codebarang'");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stock'];

    $selisih = $stock-$qty;

    $update = mysqli_query($conn, "update stock set stock='$selisih' where codebarang='$codebarang'");
    $hapusdata = mysqli_query($conn, "delete from masuk where idmasuk='$idmasuk'");

    if($update&&$hapusdata){
        header('location:masuk.php');
    } else {
        header('location:masuk.php');
    }
};

//Edit barang keluar

if(isset($_POST['editbarangkeluar'])){
    $codebarang = $_POST['codebarang'];
    $idkeluar = $_POST['idkeluar'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];
    $lihatstock = mysqli_query($conn, "select * from stock where codebarang='$codebarang'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $qtynya['stock'];

    $qtyskrg = mysqli_query($conn, "select * from keluar where idkeluar='$idkeluar'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    if($qty>$qtyskrg){
        $selisih = $qty-$qtyskrg;
        $kurangin = $stockskrg + $selisih;
        $kuranginstocknya = mysqli_query($conn, "update stock set stock='$kurangin' where codebarang='$codebarang'");
        $updatenya = mysqli_query($conn, "update keluar set penerima='$penerima',  qty='$qty' where idkeluar='$idkeluar'");
        if($kuranginstocknya&&$updatenya){

        
                header('location:keluar.php');
            } else {
                echo 'Gagal';
                header('location:keluar.php');
                    }

        } else {
            $selisih = $qtyskrg-$qty;
            $kurangin = $stockskrg - $selisih;
            $kuranginstocknya = mysqli_query($conn, "update stock set stock='$kurangin' where codebarang='$codebarang'");
            $updatenya = mysqli_query($conn, "update keluar set penerima='$penerima', qty='$qty' where idkeluar='$idkeluar'");
                if($kuranginstocknya&&$updatenya){
                    header('location:keluar.php');
                } else {        
                     header('location:keluar.php');
                    
                }
    }
}


//hapus barang keluar
if(isset($_POST['hapusbarangkeluar'])){
    $idkeluar = $_POST['idkeluar'];
    $codebarang = $_POST['codebarang'];
    $qty = $_POST['kty'];

    $getdatastock = mysqli_query($conn, "select * from stock where codebarang='$codebarang'");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stock'];

    $selisih = $stock+$qty;

    $update = mysqli_query($conn, "update stock set stock='$selisih' where codebarang='$codebarang'");
    $hapusdata = mysqli_query($conn, "delete from keluar where idkeluar='$idkeluar'");

    if($update&&$hapusdata){
        header('location:keluar.php');
    } else {
        header('location:keluar.php');
    }
};




?>