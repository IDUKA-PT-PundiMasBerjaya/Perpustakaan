<a href="../../../public/dashboard/dashboard.php">Home</a>
<a href="../../peminjamanbuku/view/tambah.php">Tambah Data Buku</a>
<a href="#" target="_blank">Cetak</a>
<form action="../../dashboard/data/dspeminjamanbuku.php" method="get">
        <label>Tampilkan :</label>
        <select name="perPage" onchange="this.form.submit()">
            <option value="15" <?php echo isset($_GET['perPage']) && $_GET['perPage'] == 5 ? 'selected' : ''; ?>>15</option>
            <option value="25" <?php echo isset($_GET['perPage']) && $_GET['perPage'] == 10 ? 'selected' : ''; ?>>25</option>
            <option value="35" <?php echo isset($_GET['perPage']) && $_GET['perPage'] == 15 ? 'selected' : ''; ?>>35</option>
            <option value="50" <?php echo isset($_GET['perPage']) && $_GET['perPage'] == 20 ? 'selected' : ''; ?>>50</option">
        </select>
    </form>
    <table border="1">
        <tr>
            <th> No </th>
            <th> Peminjaman ID Barang </th>
            <th> Nama Peminjam </th>
            <th> Nama Buku </th>
            <th> Gambar </th>
            <th> Jumlah </th>
            <th> Sisa </th>
            <th> Tanggal Pinjam </th>
            <th> Aksi </th>
        </tr>
        <?php 
            $prevPeminjamanID = null;
            $rowspanCounts = [];
            if ($num > 0) {
                //Menghitung rowspanCounts untuk setiap peminjaman ID
                while ($row = mysqli_fetch_assoc($ambildata)) {
                    $peminjamanID = $row['id_peminjaman'];
                    $rowspanCounts[$peminjamanID][] = $row;
                }
                //Kembali ke awal result set
                mysqli_data_seek($ambildata, 0);
                $no = $start + 1;
                foreach ($rowspanCounts as $peminjamanID => $rows) {
                    $rowspanCounts = count($rows);
                    $firstRow = true;
                    foreach ($rows as $key => $userAmbilData) {
                        echo "<tr>";
                        if ($firstRow) {
                            echo "<td rowspan='{$rowspanCounts}'>" . $no++ . "</td>";
                            echo "<td rowspan='{$rowspanCounts}'>" . $userAmbilData['id_peminjaman'] . "</td>";
                            echo "<td rowspan='{$rowspanCounts}'>" . $userAmbilData['namapeminjaman'] . "</td>";
                            $firstRow = false;
                        }
                        echo "<td>" . $userAmbilData['nama_buku'] . "</td>";
                        echo "<td><img src='../../buku/aset/{$userAmbilData['gambar_buku']}' alt='Gambar Buku' height='50' width='100'></td>";
                        echo "<td>" . $userAmbilData['jumlah_buku'] . "</td>";
                        echo "<td>" . $userAmbilData['stok'] . "</td>";
                        echo "<td>" . $userAmbilData['tanggal_pinjam'] . "</td>";
                        
                        if ($key === 0) {
                            echo "<td rowspan='{$rowspanCounts}'>";
                            if (isset($userAmbilData['id_peminjaman'])) {
                                echo "<a href='cetak.php?id_peminjaman={$userAmbilData['id_peminjaman']}'> Cetak </a>";
                            }
                            echo "</td>";
                        }
                    }
                }
            } else {
                echo "<tr><td colspan='10'>Tidak ada data</td></tr>";
            }
        ?>
    </table>