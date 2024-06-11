<?php
$title = 'DATA TPQ';
ob_start();
?>

<section class="max-w-7xl mx-auto py-10 min-h-dvh">
    <div class="bg-white p-4 rounded shadow-xl space-y-4">
        <div class="space-y-2 mb-20">
            <h1 class="font-bold text-2xl">Daftar Santri</h1>
            <table class="w-full">
                <thead>
                    <tr class="bg-[#4CAF50] text-white">
                        <th class="py-2 text-left px-4">Nama Lengkap</th>
                        <th class="py-2 text-left px-4">Jenis Kelamin</th>
                        <th class="py-2 text-left px-4">Tanggal Lahir</th>
                        <th class="py-2 text-left px-4">Bukti Pembayaran</th>
                        <th class="py-2 text-left px-4">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($santri as $san): ?>
                        <tr>
                            <td class="py-2 text-left px-4"><?php echo $san->name; ?></td>
                            <td class="py-2 text-left px-4"><?php echo $san->jenis_kelamin; ?></td>
                            <td class="py-2 text-left px-4"><?php echo $san->tgl_lahir; ?></td>
                            <td class="py-2 text-left px-4 truncate max-w-[10px]"><?php echo $san->bukti_pembayaran; ?></td>

                            <td class="py-2 text-left px-4 flex gap-2">
                                <form action="datatpq/update/<?php echo $san->id_user ?>" method="post">
                                    <input type="text" name="status" value="ACCEPT" class="hidden">
                                    <?php if ($san->status == 'ACCEPT'): ?>
                                        <p class="px-1 bg-gray-100 border-gray-400 border">Disetujui</p>
                                    <?php else: ?>
                                        <button class="edit-class-button px-1 bg-gray-100 border-gray-400 border">
                                            Setujui
                                        </button>
                                    <?php endif; ?>
                                </form>
                                <a href="/datatpq/delete/<?= $san->id_user; ?>"
                                    class="px-1 bg-gray-100 border-gray-400 border"
                                    onclick="return confirm('Apakah kamu yakin akan menghapus data tersebut?')">Hapus</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="space-y-2">
            <h1 class="font-bold text-2xl">Daftar Asatidz</h1>
            <table class="w-full">
                <thead>
                    <tr class="bg-[#4CAF50] text-white">
                        <th class="py-2 text-left px-4">Nama Lengkap</th>
                        <th class="py-2 text-left px-4">Jenis Kelamin</th>
                        <th class="py-2 text-left px-4">Tanggal Lahir</th>
                        <th class="py-2 text-left px-4">Bukti Pembayaran</th>
                        <th class="py-2 text-left px-4">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($asatidz as $asat): ?>
                        <tr>
                            <td class="py-2 text-left px-4"><?php echo $asat->name; ?></td>
                            <td class="py-2 text-left px-4"><?php echo $asat->jenis_kelamin; ?></td>
                            <td class="py-2 text-left px-4"><?php echo $asat->tgl_lahir; ?></td>
                            <td class="py-2 text-left px-4 truncate max-w-[10px]">
                                <?php echo $asat->bukti_ketersedian_mengajar; ?>
                            </td>

                            <td class="py-2 text-left px-4 flex gap-2">
                                <form action="datatpq/update/<?php echo $asat->id_user ?>" method="post">
                                    <input type="text" name="status" value="ACCEPT" class="hidden">
                                    <?php if ($asat->status == 'ACCEPT'): ?>
                                        <p class="px-1 bg-gray-100 border-gray-400 border">Disetujui</p>
                                    <?php else: ?>
                                        <button class="edit-class-button px-1 bg-gray-100 border-gray-400 border">
                                            Setujui
                                        </button>
                                    <?php endif; ?>
                                </form>
                                <a href="/datatpq/delete/<?= $asat->id_user; ?>"
                                    class="px-1 bg-gray-100 border-gray-400 border"
                                    onclick="return confirm('Apakah kamu yakin akan menghapus data tersebut?')">Hapus</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include __DIR__ . '/../../../layouts/index.php';
?>