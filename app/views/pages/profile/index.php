<?php
$title = 'Welcome';
ob_start();
?>


<div class="w-full flex-grow-1 mb-96 md:mb-[500px] flex justify-center my-10">
    <div class="container max-w-3xl bg-white border p-5 rounded-md">
        <h1 class="font-semibold text-xl">Profile <?= $role ?></h1>

        <div class="mt-5">
            <p>
                <span class="font-semibold mr-5">Nama Lengkap</span>
                <?= $profile->name ?>
            </p>
             <p>
                <span class="font-semibold mr-5">Jenis Kelamin</span>
                <?= $profile->jenis_kelamin ?>

            </p>
             <p>
                <span class="font-semibold mr-5">Tanggal Lahir</span>
                <?= $profile->tgl_lahir ?>

            </p>

             <p>
                <span class="font-semibold mr-5">Alamat Lengkap</span>
                <?= $profile->alamat ?>

            </p>
             <p>
                <span class="font-semibold mr-5">Kategori</span>
                <?= $profile->kategori ?>

            </p>

             <p>
                <span class="font-semibold mr-5">Email</span>
                <?= $profile->email ?>

            </p>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
include  __DIR__ .'/../../layouts/index.php';
?>