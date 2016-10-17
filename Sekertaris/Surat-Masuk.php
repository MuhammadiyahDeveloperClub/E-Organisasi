<?php

if (!empty($_POST['submit'])){

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sekertaris";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO surat (tgl_surat, tgl_diterima, penerima, no_surat, perihal, asal_surat, isi_surat, keterangan)
    VALUES (:tgl_surat, :tgl_diterima, :penerima, :no_surat, :perihal, :asal_surat, :isi_surat, :keterangan)");
    
    $stmt->bindParam(':tgl_surat', $tgl_surat);
    $stmt->bindParam(':tgl_diterima', $tgl_diterima);
    $stmt->bindParam(':penerima', $penerima);
    $stmt->bindParam(':no_surat', $no_surat);
    $stmt->bindParam(':perihal', $perihal);
    $stmt->bindParam(':asal_surat', $asal_surat);
    $stmt->bindParam(':isi_surat', $isi_surat);
    $stmt->bindParam(':keterangan', $keterangan);


    // insert a row
    @$tgl_surat = $_POST['tgl_surat'];
    @$tgl_diterima = $_POST['tgl_diterima'];
    @$penerima = $_POST['penerima'];
    @$no_surat = $_POST['no_surat'];
    @$perihal = $_POST['perihal'];
    @$asal_surat = $_POST['asal_surat'];
    @$isi_surat = $_POST['isi_surat'];
    @$keterangan = $_POST['keterangan'];
    $stmt->execute();

    echo "Surat sukses dicatat!";
    header('Location: '.$_SERVER['PHP_SELF']);
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;

} else {
    echo "Silahkan memasukkan data";
}

?>
 
<h1>Pencatat Surat Masuk</h1>
 
<form action="" method="post">
    <p>
    Tanggal masuk : <input type="text" name="tgl_surat" />  
    Tanggal diterima :<input type="text" name="tgl_diterima" />
    Penerima :<input type="text" name="penerima" />
    Asal surat :<input type="text" name="asal_surat" />
    <br />
    Nomor surat :<input type="text" name="no_surat" />
    Perihal :<input type="text" name="perihal" />
    Keterangan :<input type="text" name="keterangan" /><br />
    Isi Surat :<br><textarea name="isi_surat" rows="8" cols="50" ></textarea>
    <br />
    </p>
    <p>
        <input type="submit" name="submit" value="Submit" />
    </p>
 
</form>
