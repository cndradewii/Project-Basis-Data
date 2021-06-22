<ul class="nav navbar-nav navbar-right">
<?php   
// fungsi untuk pengecekan menu aktif
// jika menu home dipilih, menu home aktif
if ($_GET["page"]=="home") { ?>
	<li class="active">
	    <a href="?page=home"> Beranda </a>
	</li>
<?php
}
// jika tidak, menu home tidak aktif
else { ?>
	<li>
        <a href="?page=home"> Beranda </a>
    </li>
<?php
}      

// jika menu tentang dipilih, menu tentang aktif
if ($_GET["page"]=="tentang") { ?>
  <li class="active">
      <a href="?page=tentang"> Tentang Kami </a>
  </li>
<?php
}
// jika tidak, menu tentang tidak aktif
else { ?>
  <li>
        <a href="?page=tentang"> Tentang Kami </a>
    </li>
<?php
}       

// jika menu layanan dipilih, menu layanan aktif
if ($_GET["page"]=="layanan") { ?>
  <li class="active">
      <a href="?page=layanan"> Layanan </a>
  </li>
<?php
}
// jika tidak, menu layanan tidak aktif
else { ?>
  <li>
        <a href="?page=layanan"> Layanan </a>
    </li>
<?php
}       

// jika menu track dipilih, menu track aktif
if ($_GET["page"]=="track") { ?>
  <li class="active">
      <a href="?page=track"> Track </a>
  </li>
<?php
}
// jika tidak, menu track tidak aktif
else { ?>
  <li>
        <a href="?page=track"> Track </a>
    </li>
<?php
}     

// jika menu tarif dipilih, menu tarif aktif
if ($_GET["page"]=="cektarif") { ?>
  <li class="active">
      <a href="?page=cektarif"> Tarif </a>
  </li>
<?php
}
// jika tidak, menu tarif tidak aktif
else { ?>
  <li>
        <a href="?page=cektarif"> Tarif </a>
    </li>
<?php
} 

// jika menu kontak dipilih, menu kontak aktif
if ($_GET["page"]=="kontak") { ?>
  <li class="active">
      <a href="?page=kontak"> Kontak </a>
  </li>
<?php
}
// jika tidak, menu kontak tidak aktif
else { ?>
  <li>
        <a href="?page=kontak"> Kontak </a>
    </li>
<?php
}                 
?>
</ul>