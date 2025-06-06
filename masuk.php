<?php
require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Stock Barang Masuk</title> 
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3">INVENTORY</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="index.php">
                                
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Stok Barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang keluar
                            </a>
                            <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Logout
                            </a>
    
                    </div>
                   
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <img src="tcm.PNG">
                        
                        <div class="card mb-4">
                            <div class="card-header">
                            <h1 class="mt-4">BARANG MASUK</h3>
                            </div>
                            <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                               Barang Masuk
                            </button>
                            <a href=exportmasuk.php class="btn btn-success">Cetak Data</a>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Tipe Barang</th>
                                            <th>Kode Barang</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $ambilsemuadatastock = mysqli_query($conn, "select * from masuk m, stock s where s.codebarang = m.codebarang");
                                            $i = 1;
                                        while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                            $barang = $data['barang'];
                                            $idbarang = $data['idbarang'];
                                            $idmasuk =$data['idmasuk'];
                                            $tipe = $data['tipe'];
                                            $codebarang = $data['codebarang'];
                                            $deskripsi = $data['deskripsi'];
                                            $tanggal = $data['tanggal'];
                                            $qty = $data['qty'];
                                            

                                        
                                        ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$barang;?></td>
                                            <td><?=$tipe;?></td>
                                            <td><?=$codebarang;?></td>
                                            <td><?=$deskripsi;?></td>
                                            <td><?=$tanggal;?></td>
                                            <td><?=$qty;?></td>
                                            <td>

                                            
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$codebarang;?>">
                                            Hapus
                                            </button>
                                            </td>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?=$codebarang;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Barang</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                
                                                <form method="post">
                                                <div class="modal-body">
                                               
                                                <input type="number" name="qty" value="<?=$qty;?>" class="from-control" required>
                                                <br>
                                                <br>
                                                <input type="hidden" name="codebarang" value="<?=$codebarang?>">
                                                <input type="hidden" name="idmasuk" value="<?=$idmasuk?>">
                                                <button type="submit" class="btn btn-primary" name="editbarangmasuk" >Submit</button>
                                                </div>
                                                </form>

                                                </div>
                                            </div>
                                            </div>

                                        </tr>
                                            
                                            <!-- Hapus Modal -->
                                            <div class="modal fade" id="delete<?=$codebarang;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Barang</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post">
                                                <div class="modal-body">
                                                Apakah anda yakin ingin menghapus <?=$barang;?>?
                                                <br>
                                                
                                                <input type="hidden" name="kty" value="<?=$qty;?>">
                                                <input type="hidden" name="codebarang" value="<?=$codebarang?>">
                                                <input type="hidden" name="idmasuk" value="<?=$idmasuk?>">
                                                <br>
                                                <button type="submit" class="btn btn-danger" name="hapusbarangmasuk" >Delete</button>
                                                <input type="hidden" name="codebarang" value="<?=$codebarang?>">
                                                </div>
                                                </form>

                                                </div>
                                            </div>
                                            </div>

                                        <?php

                                        };

                                        ?>
                                        
                                    </tbody>
                                    
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Website 2023</div>    
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

        <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang Masuk</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form method="post">
        <div class="modal-body">
        
        <input type="text" name="codebarang" placeholder="Kode Barang" class="from-control" required>
        <br>
        <br>
        
        <input type="number" name="qty" placeholder="Jumlah" class="from-control" required>
        <br>
        <br>
        <button type="submit" class="btn btn-primary" name="tambahmasuk" >Submit</button>
        </div>
        </form>

        </div>
    </div>
    </div>

</html>