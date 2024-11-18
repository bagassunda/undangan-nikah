<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>URL Undangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($invitation as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['nama_lengkap']) ?></td>
                <td>
                    <a href="<?= base_url('home?to=' . base64_encode($item['nama_lengkap'])) ?>" class="btn btn-primary">
                        Lihat Undangan
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
