<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Catatan Keuangan</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li id="home"><a href="<?=site_url('home')?>">Home</a></li>
        <li id="category" class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="category_list"><a href="<?=site_url('category')?>">List Kategori</a></li>
            <li id="category_create"><a href="<?=site_url('category/create')?>">Tambah Kategori</a></li>
          </ul>
        </li>
        <li id="transaction" class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transaksi <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="transaction_list"><a href="<?=site_url('transaction')?>">List Transaksi</a></li>
            <li id="transaction_create"><a href="<?=site_url('transaction/create')?>">Tambah Transaksi</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>