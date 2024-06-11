<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($title) ? "$title - TPQ UNEJ" : 'TPQ UNEJ' ?></title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <?php include_once __DIR__ . '/../components/navbar.php' ?>
  <main>
    <?= $content ?>
  </main>

  <footer class="bg-zinc-50 text-center dark:bg-neutral-700 lg:text-left">
    <div class="bg-black/5 p-4 text-center text-surface dark:text-white">
      Hak Cipta &copy; 2024 - TPQ Al-Hikmah
    </div>
  </footer>
</body>

</html>