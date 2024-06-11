<article>
  <section class="flex max-w-4xl w-full border mx-auto rounded-xl p-4 mb-8 mt-4 shadow-lg min-h-[350px]">
    <div class="max-w-lg text-justify">
      <h2 class="py-4 font-bold text-2xl">TPQ AL-HIKMAH UNIVERSITAS JEMBER</h2>
      <p id="short-text">Taman Pendidikan Al-Qur'an Al-Hikmah Universitas Jember, yang berdiri pada tanggal 5 September 2023 di Masjid Al-Hikmah Universitas Jember, merupakan sebuah lembaga pendidikan yang berkomitmen untuk menjaga dan melestarikan warisan agung Al-Qur'an sebagai pedoman hidup umat Muslim, dengan mengutamakan pembelajaran Al-Qur'an dan Pendidikan Agama Islam melalui metode tilawati yang efektif dan sistematis.</p>
      <span id="more-content" class="hidden ">
        Dimana para siswa tidak hanya diajarkan cara membaca Al-Qur'an dengan fasih dan benar sesuai kaidah tajwid, tetapi juga dibekali dengan pemahaman yang mendalam tentang makna dan kandungan Al-Qur'an serta ajaran-ajaran Islam lainnya, sehingga mereka dapat menghayati dan mengamalkannya dalam kehidupan sehari-hari, dengan harapan dapat membentuk generasi muda yang tidak hanya cerdas secara intelektual, tetapi juga memiliki akhlak dan kepribadian yang mulia, serta menjadi insan yang bertakwa kepada Allah Subhanahu Wa Ta'ala dan bermanfaat bagi sesama, agama, bangsa, dan negara. Selain itu, TPQ Al-Hikmah Universitas Jember juga berupaya untuk mencetak kader-kader da'i yang tangguh dan berkomitmen untuk menyebarkan risalah Islam kepada seluruh lapisan masyarakat, dengan menanamkan jiwa kepemimpinan dan kemampuan public speaking sejak dini kepada para siswa, sehari-hari, dengan harapan dapat membentuk generasi muda yang tidak hanya cerdas secara intelektual, tetapi juga memiliki akhlak dan kepribadian yang mulia, serta menjadi insan yang bertakwa kepada Allah Subhanahu Wa Ta'ala dan bermanfaat bagi sesama, agama, bangsa, dan negara. Selain itu, TPQ Al-Hikmah Universitas Jember juga berupaya untuk mencetak kader-kader da'i yang tangguh dan berkomitmen untuk menyebarkan risalah Islam kepada seluruh lapisan masyarakat, dengan menanamkan jiwa kepemimpinan dan kemampuan public speaking sejak dini kepada para siswa, sehingga mereka dapat tumbuh menjadi pribadi yang percaya diri, berani, dan mampu mengomunikasikan nilai-nilai keislaman dengan baik kepada orang lain.
      </span>
      <span id="show-more" class="show-more text-[#4CAF50] hover:cursor-pointer">Selengkapnya</span>
    </div>
    <div class="image">
      <img src="<?php echo BASE_URL; ?>/images/logo_tpq.png" alt="Logo TPQ" class="w-full">
    </div>
  </section>
  <section class="flex max-w-4xl w-full border mx-auto rounded-xl p-4 mb-8 shadow-lg gap-6 min-h-[350px]">
    <div class="max-w-lg text-justify">
      <h2 class="py-4 font-bold text-2xl">MASJID AL-HIKMAH UNIVERSITAS JEMBER</h2>
      <p id="short-text">Masjid Al-Hikmah Universitas Jember merupakan oase spiritual yang menjadi pusat kegiatan keagamaan dan keislaman bagi sivitas akademika Universitas Jember. Didirikan pada tahun 2019, masjid ini telah menjadi landmark penting di kampus, mencerminkan komitmen universitas terhadap nilai-nilai Islam dan pengembangan karakter mahasiswa yang berakhlak mulia.</p>
      <span id="more-content" class="hidden ">
        Masjid Al-Hikmah memiliki desain arsitektur modern yang menawan, menggabungkan unsur tradisional dan kontemporer. Dinding masjid terbuat dari batu bata dengan aksen kaligrafi indah yang menghiasi bagian atasnya. Kubah masjid yang megah menjulang tinggi, menjadi simbol kemegahan dan keagungan Islam. Masjid Al-Hikmah memiliki ruang salat utama yang luas dan nyaman, mampu menampung hingga 3000 jamaah. Interior masjid didesain dengan warna-warna cerah dan pencahayaan yang memadai, menciptakan suasana yang tenang dan kondusif untuk beribadah. Masjid Al-Hikmah tidak hanya menjadi tempat ibadah, tetapi juga pusat pembinaan karakter bagi mahasiswa Universitas Jember. Di masjid ini, mahasiswa didorong untuk meningkatkan keimanan, ketakwaan, dan akhlak mulia. Berbagai kegiatan dan program yang diselenggarakan di masjid ini bertujuan untuk membentuk mahasiswa yang berkarakter Islami yang siap menjadi pemimpin bangsa yang beriman dan berakhlak mulia. Masjid Al-Hikmah menjadi simbol keharmonisan dan kebersamaan di Universitas Jember. Masjid ini menjadi tempat berkumpulnya sivitas akademika dari berbagai fakultas dan jurusan, mempersatukan mereka dalam keimanan dan ketaatan kepada Allah SWT. Masjid Al-Hikmah merupakan bukti nyata komitmen Universitas Jember untuk membangun generasi muda yang berakhlak mulia dan siap berkontribusi bagi kemajuan bangsa.
      </span>
      <span id="show-more" class="show-more text-[#4CAF50] hover:cursor-pointer">Selengkapnya</span>
    </div>
    <div class="image">
      <img src="<?php echo BASE_URL; ?>/images/masjid1.jpg" alt="Masjid" class="max-w-xs rounded-md">
    </div>
  </section>

</article>

<script>
  document.querySelectorAll('.show-more').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var moreContent = this.previousElementSibling;
      if (moreContent.style.display === 'none' || moreContent.style.display === '') {
        moreContent.style.display = 'inline';
        this.textContent = 'Lebih Sedikit';
      } else {
        moreContent.style.display = 'none';
        this.textContent = 'Selengkapnya';
      }
    });
  });
</script>