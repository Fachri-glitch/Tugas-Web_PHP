
<?php

// Fungsi untuk menghitung nilai akhir
function hitungNilai($tugas, $uts, $uas) {
    $nilaiAkhir = ($tugas * 0.30) +
                  ($uts * 0.30) +
                  ($uas * 0.40);

    return $nilaiAkhir;
}

// Fungsi untuk menentukan predikat
function tentukanPredikat($nilai) {
    if ($nilai >= 90) {
        return "A";
    } elseif ($nilai >= 80) {
        return "B";
    } elseif ($nilai >= 70) {
        return "C";
    } else {
        return "D";
    }
}

// Nilai siswa
$tugas = 80;
$uts = 85;
$uas = 90;

// Menghitung nilai akhir
$nilaiAkhir = hitungNilai($tugas, $uts, $uas);

// Menentukan predikat
$predikat = tentukanPredikat($nilaiAkhir);

// Menampilkan hasil
echo "<h2>Kalkulator Nilai Rapor</h2>";
echo "Nilai Tugas: $tugas <br>";
echo "Nilai UTS: $uts <br>";
echo "Nilai UAS: $uas <br>";
echo "Nilai Akhir: " . number_format($nilaiAkhir, 2) . "<br>";
echo "Predikat: $predikat";

?>