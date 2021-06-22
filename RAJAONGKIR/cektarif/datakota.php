<?php
error_reporting(0);
switch ($_GET['q']) {
 case 'kotaasal':
  $curl = curl_init(); 
  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "key: ganti-dengan-key-kamu"
    ),
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  $data = json_decode($response, true);
  for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
   echo "<option></option>";
      echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
  } 
  break;
 


  case 'kotatujuan':
  $curl = curl_init(); 
  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "key: ganti-dengan-key-kamu"
    ),
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  $data = json_decode($response, true);
  for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
      echo "<option></option>";
      echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
  }
  break;
 
}
?>
