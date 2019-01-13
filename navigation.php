<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="/">Start Bootstrap</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="/">
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text">Dashboard</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTransaksiin" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-exchange"></i>
          <span class="nav-link-text">Transaksi Masuk</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseTransaksiin">
          <li>
            <a href="/?p=inlist">List Transaksi</a>
          </li>
          <li>
            <a href="/?p=input">Transaksi Baru</a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTransaksiout" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-exchange"></i>
          <span class="nav-link-text">Transaksi Keluar</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseTransaksiout">
            <li>
              <a href="/?p=outlist">List Transaksi</a>
            </li>
          <li>
            <a href="/?p=output">Transaksi Baru</a>
          </li>
          <li>
            <a href="cards.html">Persutujuan Transaksi</a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsebarang" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-inbox"></i>
          <span class="nav-link-text">Barang</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapsebarang">

        </ul>
      </li>
    </ul>
    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-fw fa-sign-out"></i>Logout</a>
      </li>
    </ul>
  </div>
</nav>
