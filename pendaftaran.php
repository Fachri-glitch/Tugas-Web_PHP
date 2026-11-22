
<?php
// Menyiapkan variabel
$nama = "";
$kelas = "";
$email = "";
$ekskul = "";

$error = [];
$berhasil = false;

// Mengecek apakah tombol daftar ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Mengambil data dari form
    $nama = trim($_POST["nama"] ?? "");
    $kelas = trim($_POST["kelas"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $ekskul = trim($_POST["ekskul"] ?? "");

    // Validasi nama
    if (empty($nama)) {
        $error[] = "Nama wajib diisi.";
    } elseif (strlen($nama) < 3) {
        $error[] = "Nama minimal 3 karakter.";
    }

    // Validasi kelas
    if (empty($kelas)) {
        $error[] = "Kelas wajib diisi.";
    }

    // Validasi email
    if (empty($email)) {
        $error[] = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }

    // Validasi ekstrakurikuler
    $daftarEkskul = ["Pramuka", "Basket", "Futsal", "Paskibra"];

    if (!in_array($ekskul, $daftarEkskul, true)) {
        $error[] = "Pilih ekstrakurikuler yang tersedia.";
    }

    // Jika tidak ada error
    if (empty($error)) {
        $berhasil = true;
    }
}

// Fungsi untuk mengamankan tampilan
function aman($data) {
    return htmlspecialchars($data, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Siswa</title>
</head>
<body>

    <h2>Form Pendaftaran Ekstrakurikuler</h2>

    <form method="POST">

        Nama:
        <input type="text" name="nama"
        value="<?php echo aman($nama); ?>">
        <br><br>

        Kelas:
        <input type="text" name="kelas"
        value="<?php echo aman($kelas); ?>">
        <br><br>

        Email:
        <input type="email" name="email"
        value="<?php echo aman($email); ?>">
        <br><br>

        Ekstrakurikuler:
        <select name="ekskul">
            <option value="">-- Pilih Ekskul --</option>
            <?php
            foreach ($daftarEkskul as $pilihan) {
                $selected = ($ekskul == $pilihan) ? "selected" : "";
                echo "<option value='" . aman($pilihan) . "' $selected>"
                    . aman($pilihan) . "</option>";
            }
            ?>
        </select>

        <br><br>

        <button type="submit">Daftar</button>

    </form>

    <hr>

    <?php if (!empty($error)) { ?>

        <h3>Terjadi Kesalahan:</h3>

        <?php foreach ($error as $pesan) { ?>
            <p><?php echo aman($pesan); ?></p>
        <?php } ?>

    <?php } ?>

    <?php if ($berhasil) { ?>

        <h3>Pendaftaran Berhasil!</h3>

        <p>Nama: <?php echo aman($nama); ?></p>
        <p>Kelas: <?php echo aman($kelas); ?></p>
        <p>Email: <?php echo aman($email); ?></p>
        <p>Ekstrakurikuler: <?php echo aman($ekskul); ?></p>

    <?php } ?>

</body>
</html>