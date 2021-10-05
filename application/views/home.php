<?php $this->load->view("template/header")?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-sm-offset-2">
            <div class="jumbotron">
                <div class="container">
                    <h1>Selamat Datang</h1>
                    <p>Pencatatan Uang Masuk Dan Keluar.</p>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="jumbotron">
                            <div class="container">
                                <p>Sisa Saldo</p>
                                <h2><?=$total?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="jumbotron">
                            <div class="container">
                                <p>Total Pemasukan</p>
                                <h2><?=$total_in?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="jumbotron">
                            <div class="container">
                                <p>Total Pengeluaran</p>
                                <h2><?=$total_out?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("template/footer")?>