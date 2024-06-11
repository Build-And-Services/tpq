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
                <?php if(isset($profile->jenis_kelamin)): ?>
                    <?= $profile->jenis_kelamin ?>
                <?php endif; ?>

            </p>
             <p>
                <span class="font-semibold mr-5">Tanggal Lahir</span>
          
                   <?php if(isset($profile->tgl_lahir)): ?>
                    <?= $profile->tgl_lahir ?>
                <?php endif; ?>

            </p>

             <p>
                <span class="font-semibold mr-5">Alamat Lengkap</span>
          
                   <?php if(isset($profile->alamat)): ?>
                    <?= $profile->alamat ?>
                <?php endif; ?>
              

            </p>
             <p>
                <span class="font-semibold mr-5">Kategori</span>
           
          
                   <?php if(isset($profile->kategori)): ?>
                    <?= $profile->kategori ?>
                <?php endif; ?>

            </p>

             <p>
                <span class="font-semibold mr-5">Email</span>
                <?= $profile->email ?>

            </p>
        </div>

        <div class="mt-5">
            <a href="/logout" class="bg-red-500 px-8 py-2 rounded-md text-white font-semibold block w-fit">Logout</a>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
include  __DIR__ .'/../../layouts/index.php';
?>