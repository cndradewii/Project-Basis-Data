<?php
 $kota_asal = $_POST['kota_asal'];
 $kota_tujuan = $_POST['kota_tujuan'];
 $kurir = $_POST['kurir'];
 $berat = $_POST['berat']*1000;

 $curl = curl_init();
 curl_setopt_array($curl, array(
   CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "POST",
   CURLOPT_POSTFIELDS => "origin=".$kota_asal."&destination=".$kota_tujuan."&weight=".$berat."&courier=".$kurir."",
   CURLOPT_HTTPHEADER => array(
     "content-type: application/x-www-form-urlencoded",
     "key: ganti-dengan-key-kamu"
   ),
 ));
 $response = curl_exec($curl);
 $err = curl_error($curl);
 curl_close($curl);
 $data= json_decode($response, true);
 $kurir=$data['rajaongkir']['results'][0]['name'];
 $kotaasal=$data['rajaongkir']['origin_details']['city_name'];
 $provinsiasal=$data['rajaongkir']['origin_details']['province'];
 $kotatujuan=$data['rajaongkir']['destination_details']['city_name'];
 $provinsitujuan=$data['rajaongkir']['destination_details']['province'];
 $berat=$data['rajaongkir']['query']['weight']/1000;

?>
 <div class="panel panel-default">
  <div class="panel-body">
    <table width="100%">
      <tr>
        <td width="15%"><b>Kurir</b> </td>
        <td>&nbsp;<b><?=$kurir?></b></td>
      </tr>
      <tr>
        <td>Dari</td>
        <td>: <?=$kotaasal.", ".$provinsiasal?></td>
      </tr>
      <tr>
        <td>Tujuan</td>
        <td>: <?=$kotatujuan.", ".$provinsitujuan?></td>
      </tr>
      <tr>
        <td>Berat (Kg)</td>
        <td>: <?=$berat?></td>
      </tr>
    </table><br>
    <table class="table table-striped table-bordered ">
     <thead>
      <tr>
       <th>Nama Layanan</th>
       <th>Tarif</th>
       <th>ETD(Estimates Days)</th>
      </tr>
     </thead>
     <tbody>
      <?php
       foreach ($data['rajaongkir']['results'][0]['costs'] as $value) {
        echo "<tr>";
        echo "<td>".$value['service']."</td>";

        foreach ($value['cost'] as $tarif) {
         echo "<td align='right'>Rp " . number_format($tarif['value'],2,',','.')."</td>";
         echo "<td>".$tarif['etd']." D</td>";
        }
        
        echo "</tr>";
       }
      ?>
     </tbody>
    </table>
  </div>
 </div>