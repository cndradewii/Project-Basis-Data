<?php 
// fungsi pengecekan hak_akses untuk menampilkan menu sesuai dengan hak_akses
// jika hak_akses = Tata Usaha, tampilkan menu
if ($_SESSION['hak_akses']=='Admin') { ?>
    <ul class="nav nav-list">
    <?php
    // fungsi untuk pengecekan menu aktif
    // jika menu beranda dipilih, menu beranda aktif
    if ($_GET["module"] == "beranda") { ?>
        <li class="active">
            <a href="?module=beranda">
                <i class="menu-icon fa fa-home"></i>
                <span class="menu-text"> Beranda </span>
            </a>
            <b class="arrow"></b>
        </li>
    <?php
    } 
    // jika tidak, menu beranda tidak aktif
    else { ?>
        <li>
            <a href="?module=beranda">
                <i class="menu-icon fa fa-home"></i>
                <span class="menu-text"> Beranda </span>
            </a>
            <b class="arrow"></b>
        </li>
    <?php
    }

    // jika menu tentang dipilih, menu tentang aktif
    if ($_GET["module"] == "tentang") { ?>
        <li class="active open">
            <a href="javascript:void(0);" class="dropdown-toggle">
                <i class="menu-icon fa fa-info-circle"></i>
                <span class="menu-text"> Informasi </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="active">
                    <a href="?module=tentang">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Tentang Kami
                    </a>
                    <b class="arrow"></b>
                </li>

                <li>
                    <a href="?module=layanan">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Layanan
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    <?php
    } 
    // jika menu layanan dipilih, menu layanan aktif
    elseif ($_GET["module"] == "layanan") { ?>
        <li class="active open">
            <a href="javascript:void(0);" class="dropdown-toggle">
                <i class="menu-icon fa fa-info-circle"></i>
                <span class="menu-text"> Informasi </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="?module=tentang">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Tentang Kami
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="active">
                    <a href="?module=layanan">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Layanan
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    <?php
    } 
    // jika tidak, menu informasi tidak aktif
    else { ?>
        <li>
            <a href="javascript:void(0);" class="dropdown-toggle">
                <i class="menu-icon fa fa-info-circle"></i>
                <span class="menu-text"> Informasi </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="?module=tentang">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Tentang Kami
                    </a>
                    <b class="arrow"></b>
                </li>

                <li>
                    <a href="?module=layanan">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Layanan
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    <?php
    }

    // jika menu supir dipilih, menu supir aktif
    if ($_GET["module"] == "supir" || $_GET["module"] == "form_supir") { ?>
        <li class="active open">
            <a href="javascript:void(0);" class="dropdown-toggle">
                <i class="menu-icon fa fa-folder-o"></i>
                <span class="menu-text"> Data Master </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="active">
                    <a href="?module=supir">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Supir
                    </a>
                    <b class="arrow"></b>
                </li>

                <li>
                    <a href="?module=kendaraan">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Kendaraan
                    </a>
                    <b class="arrow"></b>
                </li>

                <li>
                    <a href="?module=customers">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Customer Service
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    <?php
    } 
    // jika menu kendaraan dipilih, menu kendaraan aktif
    elseif ($_GET["module"] == "kendaraan" || $_GET["module"] == "form_kendaraan") { ?>
        <li class="active open">
            <a href="javascript:void(0);" class="dropdown-toggle">
                <i class="menu-icon fa fa-folder-o"></i>
                <span class="menu-text"> Data Master </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="?module=supir">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Supir
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="active">
                    <a href="?module=kendaraan">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Kendaraan
                    </a>
                    <b class="arrow"></b>
                </li>

                <li>
                    <a href="?module=customers">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Customer Service
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    <?php
    } 
    // jika menu pelanggan dipilih, menu pelanggan aktif
    elseif ($_GET["module"] == "pelanggan" || $_GET["module"] == "form_pelanggan") { ?>
        <li class="active open">
            <a href="javascript:void(0);" class="dropdown-toggle">
                <i class="menu-icon fa fa-folder-o"></i>
                <span class="menu-text"> Data Master </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="?module=supir">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Supir
                    </a>
                    <b class="arrow"></b>
                </li>

                <li>
                    <a href="?module=kendaraan">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Kendaraan
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="active">
                    <a href="?module=customers">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Customer Service
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    <?php
    } 
    // jika tidak, menu data master tidak aktif
    else { ?>
        <li>
            <a href="javascript:void(0);" class="dropdown-toggle">
                <i class="menu-icon fa fa-folder-o"></i>
                <span class="menu-text"> Data Master </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="?module=supir">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Supir
                    </a>
                    <b class="arrow"></b>
                </li>

                <li>
                    <a href="?module=kendaraan">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Kendaraan
                    </a>
                    <b class="arrow"></b>
                </li>

                <li>
                    <a href="?module=customers">
                        <i class="menu-icon fa fa-angle-double-right"></i>
                        Customers Servis
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    <?php
    }

    // jika menu pengiriman dipilih, menu pengiriman aktif
    if ($_GET["module"] == "pengiriman" || $_GET["module"] == "form_pengiriman") { ?>
        <li class="active">
            <a href="?module=pengiriman">
                <i class="menu-icon fa fa-clone"></i>
                <span class="menu-text"> Pengiriman </span>
            </a>
            <b class="arrow"></b>
        </li>
    <?php
    } 
    // jika tidak, menu pengiriman tidak aktif
    else { ?>
        <li>
            <a href="?module=pengiriman">
                <i class="menu-icon fa fa-clone"></i>
                <span class="menu-text"> Pengiriman </span>
            </a>
            <b class="arrow"></b>
        </li>
    <?php
    }
    // jika menu pengguna dipilih, menu pengguna aktif
    if ($_GET["module"] == "pengguna") { ?>
        <li class="active">
            <a href="?module=pengguna">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text"> Pengguna </span>
            </a>
            <b class="arrow"></b>
        </li>
    <?php
    } 
    // jika tidak, menu pengguna tidak aktif
    else { ?>
        <li>
            <a href="?module=pengguna">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text"> Pengguna </span>
            </a>
            <b class="arrow"></b>
        </li>
    <?php
    }
    ?>
    </ul>
<?php
} 
// jika hak_akses = Guru, tampilkan menu
elseif ($_SESSION['hak_akses']=='Pimpinan'){ ?>
    <ul class="nav nav-list">
    <?php
    // fungsi untuk pengecekan menu aktif
    // jika menu beranda dipilih, menu beranda aktif
    if ($_GET["module"] == "beranda") { ?>
        <li class="active">
            <a href="?module=beranda">
                <i class="menu-icon fa fa-home"></i>
                <span class="menu-text"> Beranda </span>
            </a>
            <b class="arrow"></b>
        </li>
    <?php
    } 
    // jika tidak, menu beranda tidak aktif
    else { ?>
        <li>
            <a href="?module=beranda">
                <i class="menu-icon fa fa-home"></i>
                <span class="menu-text"> Beranda </span>
            </a>
            <b class="arrow"></b>
        </li>
    <?php
    }

    // jika menu laporan dipilih, menu laporan aktif
    if ($_GET["module"] == "laporan") { ?>
        <li class="active">
            <a href="?module=laporan">
                <i class="menu-icon fa fa-file-text-o"></i>
                <span class="menu-text"> Laporan </span>
            </a>
            <b class="arrow"></b>
        </li>
    <?php
    } 
    // jika tidak, menu laporan tidak aktif
    else { ?>
        <li>
            <a href="?module=laporan">
                <i class="menu-icon fa fa-file-text-o"></i>
                <span class="menu-text"> Laporan </span>
            </a>
            <b class="arrow"></b>
        </li>
    <?php
    }
    ?>
    </ul>
<?php
}
?>