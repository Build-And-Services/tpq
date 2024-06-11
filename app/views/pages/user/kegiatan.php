<?php
$title = 'Kegiatan';
ob_start();
?>

<section class="max-w-7xl mx-auto py-10">
    <div class="bg-white p-4 rounded shadow-xl">
        <div class="flex items-center justify-between mb-8">
            <h2 class="font-bold text-2xl">Kegiatan TPQ Al-Hikmah</h2>
            <button id="openKegiatanModal" class="bg-[#4CAF50] px-3 py-1 text-white rounded">Tambah Kegiatan</button>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <?php foreach ($kegiatan as $item): ?>
                <div class="rounded-md overflow-hidden p-4">
                    <img src="<?php echo $item->foto; ?>" alt="<?php echo $item->nama_kegiatan; ?>"
                        class="aspect-video object-cover rounded-md">
                    <small class="py-2 block"><?php echo $item->tanggal; ?></small>
                    <h3 class="font-bold"><?php echo $item->nama_kegiatan; ?></h3>
                    <p><?php echo $item->deskripsi ?></p>
                    <div class="mt-2 flex gap-2">
                        <button data-id="<?php echo $item->id; ?>" data-nama="<?php echo $item->nama_kegiatan; ?>"
                            data-deskripsi="<?php echo $item->deskripsi; ?>" data-tanggal="<?php echo $item->tanggal; ?>"
                            class="px-1 bg-gray-100 border-gray-400 border edit-kegiatan">Edit</button>
                        <a href="/kegiatan/delete/<?= $item->id; ?>" class="px-1 bg-gray-100 border-gray-400 border"
                            onclick="return confirm('Apakah kamu yakin akan menghapus data tersebut?')">Hapus</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Modal -->
<div id="kegiatanModal" class="modal hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded shadow-lg max-w-lg w-full relative">
        <span id="closeModal" class="absolute top-2 right-2 text-2xl cursor-pointer">&times;</span>
        <h2 id="modalTitle" class="font-bold text-xl mb-4">Tambah Kegiatan Baru</h2>
        <form id="modalForm" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="kegiatan_id" id="kegiatan_id">
            <div class="mb-4">
                <label for="nama_kegiatan" class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" id="nama_kegiatan"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-green-200">
            </div>
            <div class="mb-4">
                <label for="foto" class="block text-sm font-medium text-gray-700">Foto Kegiatan</label>
                <input type="file" name="foto" id="foto"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-green-200">
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="3"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-green-200"></textarea>
            </div>
            <div class="mb-4">
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-green-200">
            </div>
            <div class="flex justify-end">
                <button type="button" id="closeModalBtn"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded mr-2">Batal</button>
                <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var modal = document.getElementById("kegiatanModal");
        var modalTitle = document.getElementById("modalTitle");
        var modalForm = document.getElementById("modalForm");
        var closeModalBtn = document.getElementById("closeModal");

        function openModal(title, action) {
            modalTitle.innerText = title;
            modalForm.action = action;
            modal.classList.remove("hidden");
        }

        function closeModal() {
            modal.classList.add("hidden");
        }

        document.getElementById("openKegiatanModal").addEventListener("click", function () {
            openModal("Tambah Kegiatan Baru", "/kegiatan/store"); // Set action for store
        });

        document.querySelectorAll(".edit-kegiatan").forEach(function (button) {
            button.addEventListener("click", function () {
                var nama = this.getAttribute("data-nama");
                var deskripsi = this.getAttribute("data-deskripsi");
                var tanggal = this.getAttribute("data-tanggal");
                var id = this.getAttribute("data-id");
                document.getElementById("nama_kegiatan").value = nama;
                document.getElementById("deskripsi").value = deskripsi;
                document.getElementById("tanggal").value = tanggal;
                document.getElementById("kegiatan_id").value = id; // Set the kegiatan id for edit mode
                openModal("Edit Kegiatan", "/kegiatan/update/" + id); // Set action for edit
            });
        });

        closeModalBtn.addEventListener("click", closeModal);
    });
</script>


<?php
$content = ob_get_clean();
include __DIR__ . '/../../layouts/index.php';
?>