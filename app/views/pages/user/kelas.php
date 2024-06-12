<?php
$title = 'Kelas';
ob_start();
?>
<section class="max-w-7xl mx-auto py-10 min-h-dvh">
    <div class="bg-white p-4 rounded shadow-xl space-y-4">

        <?php if ($_SESSION['user']['role'] != 'admin'): ?>
            <?php foreach ($kelasUser as $k): ?>
                <div class="space-y-2">
                    <h1 class="font-bold text-2xl">Kelas <?php echo $k->kategori; ?></h1>
                    <p>Deskripsi Tentang Kelas <?php echo $k->kategori; ?> Disini</p>
                    <div class="flex justify-between">
                        <a target="_blank"
                            href="<?php echo $k->link_meet; ?>"
                            class="bg-[#4CAF50] block w-fit px-3 py-1 text-white text-lg rounded-md font-semibold">Gabung ke
                            Kelas
                            <?php echo $k->kategori; ?></a>
                        <?php if ($_SESSION['user']['role'] == 'asatidz'): ?>
                            <a href="/kehadiran"
                                class="bg-[#4CAF50] block w-fit px-3 py-1 text-white text-lg rounded-md font-semibold">
                                Presensi Daftar Hadir</a>
                            <a href="/penilaian"
                                class="bg-[#4CAF50] block w-fit px-3 py-1 text-white text-lg rounded-md font-semibold">Penilaian
                                Santri di Kelas
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="space-y-2">
            <h1 class="font-bold text-2xl">Daftar Kelas</h1>
            <table class="w-full">
                <thead>
                    <tr class="bg-[#4CAF50] text-white">
                        <th class="py-2 text-left px-4">Kategori Kelas</th>
                        <th class="py-2 text-left px-4">Jadwal</th>
                        <th class="py-2 text-left px-4">Jam</th>
                        <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                            <th class="py-2 text-left px-4">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kelas as $item): ?>
                        <tr>
                            <td class="py-2 text-left px-4"><?php echo $item->kategori; ?></td>
                            <td class="py-2 text-left px-4"><?php echo $item->jadwal; ?></td>
                            <td class="py-2 text-left px-4"><?php echo date('H:i', strtotime($item->mulai)); ?> -
                                <?php echo date('H:i', strtotime($item->selesai)); ?>
                            </td>
                            <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                                <td class="py-2 text-left px-4 flex gap-2">
                                    <button class="edit-class-button px-1 bg-gray-100 border-gray-400 border"
                                        data-id="<?php echo $item->id_kelas; ?>"
                                        data-id_kategori="<?php echo $item->id_kategori; ?>"
                                        data-link_meet="<?php echo $item->link_meet; ?>"
                                        data-jadwal="<?php echo $item->jadwal; ?>" data-mulai="<?php echo $item->mulai; ?>"
                                        data-mulai="<?php echo $item->mulai; ?>">
                                        Edit
                                    </button>
                                    <a href="/kelas/delete/<?= $item->id_kelas; ?>"
                                        class="px-1 bg-gray-100 border-gray-400 border"
                                        onclick="return confirm('Apakah kamu yakin akan menghapus data tersebut?')">Hapus</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<div id="editClassModal" class="modal hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded shadow-lg max-w-lg w-full relative">
        <span id="closeEditModal" class="absolute top-2 right-2 text-2xl cursor-pointer">&times;</span>
        <h2 class="font-bold text-xl mb-4">Ubah Kelas</h2>
        <form id="editClassForm" action="/kelas/update" method="post">
            <input type="hidden" name="id_kelas" id="edit_id_kelas">
            <div class="mb-4">
                <label for="edit_kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="id_kategori" id="edit_kategori"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-green-200">
                    <?php foreach ($kategori as $kategori_item): ?>
                        <option value="<?php echo $kategori_item->id_kategori; ?>">
                            <?php echo $kategori_item->kategori; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="edit_link_meet" class="block text-sm font-medium text-gray-700">Link Meet</label>
                <input type="url" name="link_meet" id="edit_link_meet"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-green-200">
            </div>
            <div class="mb-4">
                <label for="edit_jadwal" class="block text-sm font-medium text-gray-700">Jadwal</label>
                <input type="text" name="jadwal" id="edit_jadwal"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-green-200">
            </div>
            <div class="mb-4">
                <label for="edit_mulai" class="block text-sm font-medium text-gray-700">Mulai</label>
                <input type="time" name="mulai" id="edit_mulai"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-green-200">
            </div>
            <div class="mb-4">
                <label for="edit_selesai" class="block text-sm font-medium text-gray-700">Selesai</label>
                <input type="time" name="selesai" id="edit_selesai"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-green-200">
            </div>
            <div class="flex justify-end">
                <button type="button" id="cancelEditBtn"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded mr-2">Batal</button>
                <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var editModal = document.getElementById("editClassModal");
        var editForm = document.getElementById("editClassForm");
        var closeEditModalBtn = document.getElementById("closeEditModal");
        var cancelEditBtn = document.getElementById("cancelEditBtn");

        function openEditModal() {
            editModal.classList.remove("hidden");
        }

        function closeEditModal() {
            editModal.classList.add("hidden");
        }

        document.querySelectorAll(".edit-class-button").forEach(function (button) {
            button.addEventListener("click", function () {
                var id_kelas = this.getAttribute("data-id");
                var id_kategori = this.getAttribute("data-id_kategori");
                var link_meet = this.getAttribute("data-link_meet");
                var jadwal = this.getAttribute("data-jadwal");
                var mulai = this.getAttribute("data-mulai");
                var selesai = this.getAttribute("data-selesai");

                document.getElementById("edit_id_kelas").value = id_kelas;
                document.getElementById("edit_link_meet").value = link_meet;
                document.getElementById("edit_jadwal").value = jadwal;
                document.getElementById("edit_mulai").value = mulai;
                document.getElementById("edit_selesai").value = selesai;

                var select = document.getElementById("edit_kategori");
                for (var i = 0; i < select.options.length; i++) {
                    if (select.options[i].value == id_kategori) {
                        select.options[i].selected = true;
                        break;
                    }
                }

                openEditModal();
            });
        });

        closeEditModalBtn.addEventListener("click", closeEditModal);
        cancelEditBtn.addEventListener("click", closeEditModal);
    });
</script>


<?php
$content = ob_get_clean();
include __DIR__ . '/../../layouts/index.php';
?>