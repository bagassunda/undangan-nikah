<html>

<head>
    <title>Bagas Mega Wedding</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.9.3/dist/semantic.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.9.3/dist/semantic.min.js"></script>

    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>

    <link rel="stylesheet" href="https://npmcdn.com/sweetalert2@4.0.15/dist/sweetalert2.min.css">

    <!-- Custom Style for Body -->
    <style>
        body {
            font-family: 'Sacramento', serif;
        }
    </style>

</head>

<body>
    <!-- Audio Element -->
    <audio id="weddingMusic" autoplay loop>
        <source src="<?php echo base_url(); ?>assets/audio/audio1.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    <div class="ui placeholder segment">
        <div class="ui icon header">
            <i class="red heart icon"></i>
            <?php foreach ($invitation as $item): ?>
                <h1>Bagas & Mega</h1>
                <h2>Kepada Yth. Bapak/Ibu/Sdr/i</h2>
                <h3><?= htmlspecialchars($item['nama_lengkap']) ?></h3>
                <button id="wdp-button-wrapper" class="ui red button">
                    Buka Undangan
                    <i class="envelope open outline icon" style="margin: 0px;"></i>
                </button>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Saat tombol diklik, setel musik dan pindah halaman
            $('#wdp-button-wrapper').on('click', function () {
                var music = $('#weddingMusic')[0];
                music.play().catch(function (error) {
                    console.warn('Autoplay is blocked by browser:', error);
                });

                // Simpan status pemutaran musik ke localStorage
                localStorage.setItem('isMusicPlaying', 'true');

                // Alihkan ke halaman baru setelah delay
                setTimeout(function () {
                    var redirectUrl = "<?= base_url('home?to=' . base64_encode($item['nama_lengkap'])) ?>";
                    window.location.href = redirectUrl;
                }, 500); // 500ms delay
            });
        });
    </script>
</body>

</html>