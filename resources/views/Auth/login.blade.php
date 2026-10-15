<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PLN NPS Logistic System</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --blue: #009fc1;
            --cyan: #16c9dc;
            --navy: #173d50;
            --text: #244657;
            --muted: #8196a1;
            --border: #d7e8ed;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: #eaf7fa;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        /* SATU WADAH UTAMA UNTUK KEDUA SISI */
        .login-container {
            width: min(1440px, 100%);
            min-height: 680px;
            height: min(850px, calc(100vh - 48px));
            display: flex;
            position: relative;
            isolation: isolate;
            overflow: hidden;
            border-radius: 22px;
            background: #f7fcfd;
            box-shadow: 0 22px 65px rgba(18, 79, 103, 0.16);
        }

        /* SISI KIRI: FOTO BACKGROUND MILIKMU */

        .login-visual {
            flex: 1 0 42%;
            min-width: 0;
            position: relative;
            overflow: hidden;

            background-image:
                linear-gradient(90deg,
                    rgba(0, 55, 95, 0.08),
                    transparent 70%),
                url('assets/images/backgroundKPI.png');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /*
         * PENGHUBUNG KIRI-KANAN.
         * Gradasi menutupi batas foto secara perlahan.
         * Tidak menggunakan border vertikal.
         */

        .login-visual::after {
            content: "";
            position: absolute;
            z-index: 3;
            top: 0;
            right: -1px;
            width: 150px;
            height: 100%;
            pointer-events: none;

            background: linear-gradient(90deg,
                    rgba(226, 249, 252, 0) 0%,
                    rgba(226, 249, 252, 0.10) 25%,
                    rgba(226, 249, 252, 0.42) 55%,
                    rgba(226, 249, 252, 0.82) 78%,
                    #f0fbfd 100%);
        }


        /* SISI KANAN: TANPA PEMBATAS KAKU */
        /* Sidebar kiri tetap menggunakan foto yang sudah ada */
        .login-visual {
            flex: 0 0 42%;
            min-width: 0;
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        /* Sidebar kanan menyambung dengan lengkungan sidebar kiri */

        .login-side {
            flex: 1;
            min-width: 0;
            position: relative;
            isolation: isolate;

            display: flex;
            align-items: center;
            justify-content: center;

            /* Menyambungkan panel kanan dengan gambar kiri */
            margin-left: -32px;
            padding: 35px 40px 35px 65px;

            border-radius: 75px 0 0 75px;

            background: linear-gradient(115deg,
                    rgba(239, 251, 253, 0.98) 0%,
                    rgba(249, 253, 254, 0.99) 38%,
                    #ffffff 100%);

            box-shadow:
                -5px 0 0 rgba(18, 201, 216, 0.25),
                -11px 0 0 rgba(255, 255, 255, 0.25);

            overflow: hidden;
        }

        .login-side::before {
            content: "";
            position: absolute;
            z-index: -1;
            top: -105px;
            right: -90px;

            width: 270px;
            height: 270px;
            border-radius: 50%;

            background: radial-gradient(circle,
                    rgba(0, 190, 210, 0.17),
                    rgba(0, 190, 210, 0.04) 55%,
                    transparent 73%);

            pointer-events: none;
        }

        .login-side::after {
            content: "";
            position: absolute;
            z-index: -1;
            right: -105px;
            bottom: -160px;

            width: 300px;
            height: 245px;
            border: 14px solid rgba(0, 180, 205, 0.12);
            border-radius: 50%;

            box-shadow: 0 0 0 12px rgba(0, 180, 205, 0.04);
            transform: rotate(-25deg);

            pointer-events: none;
        }

        .login-form {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 390px;
        }

        .form-heading {
            font-size: 29px;
            font-weight: 700;
            color: var(--navy);
            letter-spacing: -0.6px;
        }

        .form-description {
            font-size: 11px;
            color: #8296a0;
            margin-top: 6px;
            margin-bottom: 27px;
            line-height: 1.8;
        }

        .field-label {
            display: block;
            color: #56717f;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        /* PILIHAN ROLE */
        .role-switch {
            display: flex;
            padding: 4px;
            gap: 4px;
            background: rgba(225, 242, 247, 0.65);
            border: 1px solid #d5e8ee;
            border-radius: 10px;
            margin-bottom: 23px;
        }

        .role-option {
            flex: 1;
            position: relative;
            cursor: pointer;
        }

        .role-option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .role-option span {
            min-height: 39px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
            font-size: 11px;
            color: #607b88;
            transition: 0.25s ease;
        }

        .role-option input:checked+span {
            color: #fff;
            background: linear-gradient(110deg, #008eb9, #13bed0);
            box-shadow: 0 4px 12px rgba(0, 159, 193, 0.20);
        }

        .role-option input:focus-visible+span {
            outline: 2px solid #087cf0;
            outline-offset: 2px;
        }

        /* INPUT */
        .form-group {
            margin-bottom: 17px;
        }

        .input-wrap {
            height: 47px;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 13px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: rgba(255, 255, 255, 0.78);
            transition: border-color 0.2s, box-shadow 0.2s,
                background 0.2s;
        }

        .input-wrap:focus-within {
            border-color: #08abc8;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(0, 175, 205, 0.10);
        }

        .input-icon {
            width: 17px;
            height: 17px;
            flex-shrink: 0;
            color: #7295a5;
        }

        .input-wrap input {
            width: 100%;
            min-width: 0;
            height: 100%;
            border: none;
            outline: none;
            background: transparent;
            font-family: inherit;
            font-size: 11px;
            color: var(--text);
        }

        .input-wrap input::placeholder {
            color: #a1b2ba;
        }

        .password-toggle {
            border: none;
            background: transparent;
            color: #668b9b;
            cursor: pointer;
            font-family: inherit;
            font-size: 10px;
            padding: 5px;
        }

        .password-toggle:hover {
            color: #008eb9;
        }

        /* REMEMBER DAN LUPA PASSWORD */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin: 3px 0 24px;
            font-size: 10px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #718995;
            cursor: pointer;
        }

        .remember input {
            accent-color: #00a6c4;
            width: 14px;
            height: 14px;
        }

        .form-link {
            text-decoration: none;
            color: #008fae;
            font-weight: 600;
        }

        .form-link:hover {
            color: #006d8b;
            text-decoration: underline;
        }

        /* TOMBOL LOGIN */
        .login-button {
            width: 100%;
            min-height: 47px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            border: none;
            border-radius: 9px;
            background: linear-gradient(105deg, #0098bd, #13bfd0);
            color: #fff;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(0, 158, 190, 0.16);
            transition: transform 0.2s, box-shadow 0.2s,
                filter 0.2s;
        }

        .login-button:hover {
            transform: translateY(-2px);
            filter: brightness(1.05);
            box-shadow: 0 11px 25px rgba(0, 158, 190, 0.25);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .login-button:focus-visible {
            outline: 3px solid rgba(0, 159, 193, 0.35);
            outline-offset: 3px;
        }

        .login-button:disabled {
            opacity: 0.7;
            cursor: wait;
            transform: none;
        }

        .register-text {
            text-align: center;
            margin-top: 17px;
            font-size: 10px;
            color: #91a2aa;
        }

        .form-footer {
            margin-top: 34px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            font-size: 9px;
            color: #9aadb5;
        }

        .error-message {
            margin-top: 6px;
            font-size: 11px;
            color: #dc3545;
        }


        /* Input lebih lembut */
        .input-wrap {
            background: rgba(255, 255, 255, 0.70);
            border-color: rgba(0, 153, 185, 0.20);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .input-wrap:focus-within {
            border-color: #00aec7;
            box-shadow: 0 0 0 3px rgba(0, 174, 199, 0.12);
        }

        .input-icon {
            color: #00a0bd;
        }

        /* Tombol mengikuti aksen cyan pada gambar */
        .login-button {
            background: linear-gradient(105deg,
                    #008fb5 0%,
                    #00abc5 55%,
                    #16c7d4 100%);

            box-shadow: 0 8px 22px rgba(0, 157, 188, 0.18);
        }

        .login-button:hover {
            box-shadow: 0 11px 26px rgba(0, 157, 188, 0.26);
        }

        /* Warna identitas link */
        .form-link {
            color: #008eae;
        }

        .form-link:hover {
            color: #006f8c;
        }


        #unit-group {
            margin-bottom: 17px;
        }

        .unit-hint {
            color: #8ba1ab;
            font-size: 10px;
            margin-top: 6px;
        }

        #unit-group[hidden] {
            display: none !important;
        }



        /* TABLET */
        @media (max-width: 1000px) {
            body {
                padding: 18px;
            }

            .login-container {
                height: auto;
                min-height: 650px;
            }

            .login-visual {
                flex-basis: 48%;
            }

            .login-side {
                padding: 32px 25px;
            }

            .login-visual::after {
                width: 65px;
            }

            .form-footer {
                flex-wrap: wrap;
            }
        }

        /* MOBILE */
        @media (max-width: 700px) {
            body {
                padding: 12px;
                min-height: 100dvh;
            }

            .login-container {
                width: 100%;
                min-height: 0;
                height: auto;
                border-radius: 18px;
            }

            .login-visual {
                display: none;
            }

            .login-side {
                margin-left: 0;
                padding: 36px 24px;
                border-radius: 18px;
                box-shadow: none;
                min-height: 620px;
                background: linear-gradient(180deg,
                        #e9f9fc 0%,
                        #f7fcfd 35%,
                        #ffffff 100%);
            }

            .login-form {
                max-width: 420px;
            }

            .form-heading {
                font-size: 27px;
            }

            .form-footer {
                margin-top: 30px;
            }
        }

        @media (max-height: 720px) and (min-width: 701px) {
            body {
                padding: 0px;
            }

            .login-container {
                height: calc(100vh - 24px);
                min-height: 580px;
            }

            .login-side {
                padding-top: 22px;
                padding-bottom: 22px;
            }

            .form-description {
                margin-bottom: 17px;
            }

            .role-switch {
                margin-bottom: 16px;
            }

            .form-group {
                margin-bottom: 12px;
            }

            .form-options {
                margin-bottom: 17px;
            }

            .form-footer {
                margin-top: 20px;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                transition-duration: 0.01ms !important;
                animation-duration: 0.01ms !important;
            }
        }


        /* =========================================
   LOGIN - LAYOUT MENYATU
   ========================================= */

        .login-container {
            display: grid;
            grid-template-columns: minmax(0, 68%) minmax(340px, 32%);
            width: calc(100% - 24px);
            min-height: 620px;
            height: calc(100vh - 24px);
            max-height: 900px;
            margin: 12px auto;
            position: relative;
            overflow: hidden;
            border-radius: 22px;
            background: #eafaff;
            box-shadow: 0 12px 40px rgba(0, 88, 130, 0.12);
        }

        /* BAGIAN KIRI: PERTAHANKAN BACKGROUND FOTO */
        .login-left {
            position: relative;
            min-width: 0;
            min-height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            overflow: hidden;
            z-index: 1;
        }

        /* Gradasi transparan agar foto menyatu dengan panel kanan */
        .login-left::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 20%;
            pointer-events: none;
            background: linear-gradient(to right,
                    rgba(237, 251, 255, 0),
                    rgba(237, 251, 255, 0.18),
                    rgba(237, 251, 255, 0.85));
        }

        /* BAGIAN KANAN: PANEL FORM */
        .login-right {
            position: relative;
            z-index: 2;
            min-width: 0;
            display: flex;
            justify-content: center;
            align-items: center;

            padding: 30px 24px;

            background: linear-gradient(145deg,
                    rgba(250, 254, 255, 0.97),
                    rgba(235, 250, 253, 0.96));

            border: 2px solid #b8edf5;
            border-left: 3px solid #a3e9f2;
            border-radius: 34px 22px 22px 34px;

            margin-left: -18px;
            box-shadow: -12px 0 30px rgba(0, 159, 193, 0.08);
        }

        /* Kotak pembatas dalam untuk area form */
        .login-right::before {
            content: "";
            position: absolute;
            inset: 8px;
            border: 1px solid rgba(0, 173, 202, 0.12);
            border-radius: 27px 16px 16px 27px;
            pointer-events: none;
        }

        /* Isi form tetap berada di atas ornamen */
        .login-right>* {
            position: relative;
            z-index: 1;
        }

        /* Lebar konten form, bukan lebar panel */
        .login-form,
        .login-content,
        .login-card {
            width: 100%;
            max-width: 420px;
            min-width: 0;
            margin-left: auto;
            margin-right: auto;
        }

        /* Input tetap seperti desain sebelumnya */
        .login-right input:not([type="checkbox"]),
        .login-right select {
            width: 100%;
            box-sizing: border-box;
        }

        /* Ornamen lengkung biru muda di sudut kanan bawah */
        .login-right::after {
            content: "";
            position: absolute;
            width: 210px;
            height: 150px;
            right: -75px;
            bottom: -85px;
            border: 12px solid rgba(0, 177, 205, 0.09);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
        }

        /* TABLET */
        @media (max-width: 900px) {
            .login-container {
                grid-template-columns: minmax(0, 58%) minmax(320px, 42%);
            }

            .login-right {
                padding: 24px 18px;
            }

            .login-form,
            .login-content,
            .login-card {
                max-width: 360px;
            }
        }

        /* HP */
        @media (max-width: 650px) {
            .login-container {
                display: flex;
                flex-direction: column;
                width: calc(100% - 20px);
                height: auto;
                min-height: calc(100vh - 20px);
                max-height: none;
                margin: 10px auto;
                overflow: hidden;
                border-radius: 20px;
            }

            .login-left {
                min-height: 220px;
                height: 220px;
                flex-shrink: 0;
            }

            .login-left::after {
                width: 100%;
                height: 35%;
                top: auto;
                background: linear-gradient(to bottom,
                        transparent,
                        rgba(237, 251, 255, 0.8));
            }

            .login-right {
                flex: 1;
                margin-left: 0;
                margin-top: -16px;
                padding: 28px 20px;
                border: 2px solid #b8edf5;
                border-radius: 25px 25px 18px 18px;
            }

            .login-right::before {
                border-radius: 19px;
            }

            .login-form,
            .login-content,
            .login-card {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">

        <!-- SISI KIRI -->
        <section class="login-visual">

        </section>

        <!-- SISI KANAN -->
        <section class="login-side">
            <div class="login-form">

                <h2 class="form-heading">Selamat Datang</h2>

                <p class="form-description">
                    Masuk untuk mengakses sistem KPI
                </p>

                <form action="#" method="POST">
                    @csrf

                    <label class="field-label">Pilih Workspace</label>

                    <div class="role-switch">
                        <label class="role-option">
                            <input type="radio" name="role" value="unit" checked>
                            <span>Unit</span>
                        </label>

                        <label class="role-option">
                            <input type="radio" name="role" value="admin">
                            <span>Admin</span>
                        </label>
                    </div>


                    <!-- PILIHAN UNIT: MUNCUL HANYA UNTUK UNIT -->
                    <div class="form-group" id="unit-group">
                        <label for="unit" class="field-label">
                            Unit Kerja
                        </label>

                        <div class="input-wrap">
                            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.7" aria-hidden="true">
                                <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z" />
                                <circle cx="12" cy="10" r="2.5" />
                            </svg>

                            <input type="text" id="unit" name="unit" list="unit-options"
                                placeholder="Pilih atau ketik nama unit" autocomplete="off" required>
                        </div>

                        <datalist id="unit-options">
                            <!-- Ganti contoh berikut dengan daftar unit resmi PLN NPS -->
                            <option value="Unit Ampana">
                            <option value="Unit Amurang">
                            <option value="Unit Anggrek">
                            <option value="Unit Asahan">
                            <option value="Unit Bangka">
                            <option value="Unit Banjarsari">
                            <option value="Unit Belitung">
                            <option value="Unit Bolok">
                            <option value="Unit Kendari">
                            <option value="Unit Ketapang">
                            <option value="Unit Ropa">
                            <option value="Unit Tembilahan">
                            <option value="Unit Tidore">
                        </datalist>

                        <p class="unit-hint">
                            Ketik nama unit atau pilih dari daftar.
                        </p>
                    </div>


                    <div class="form-group">
                        <label for="login_id" class="field-label">
                            Email / NIP
                        </label>

                        <div class="input-wrap">
                            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.7" aria-hidden="true">
                                <rect x="3" y="5" width="18" height="14" rx="2" />
                                <path d="m3 7 9 6 9-6" />
                            </svg>

                            <input id="login_id" type="text" name="login_id" placeholder="Masukkan email atau NIP"
                                autocomplete="username" value="{{ old('login_id') }}" required>
                        </div>

                        @error('login_id')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="field-label">
                            Password
                        </label>

                        <div class="input-wrap">
                            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.7" aria-hidden="true">
                                <rect x="5" y="10" width="14" height="11" rx="2" />
                                <path d="M8 10V7a4 4 0 0 1 8 0v3" />
                            </svg>

                            <input id="password" type="password" name="password" placeholder="Masukkan password"
                                autocomplete="current-password" required>

                            <button class="password-toggle" type="button" id="togglePassword"
                                aria-label="Tampilkan password" aria-pressed="false">
                                Lihat
                            </button>
                        </div>

                        @error('password')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-options">
                        <label class="remember">
                            <input type="checkbox" name="remember" value="1">
                            <span>Ingat saya</span>
                        </label>

                        <a href="#" class="form-link">
                            Lupa password?
                        </a>
                    </div>

                    <button class="login-button" type="submit">
                        <span>Masuk ke Dashboard</span>
                    </button>

                    <p class="register-text">
                        Belum punya akun?
                        <a href="#" class="form-link">
                            Hubungi administrator
                        </a>
                    </p>

                </form>

                <div class="form-footer">
                    <span>PLN Nusantara Power Services</span>
                    <span>Logistic &amp; System</span>
                </div>

            </div>
        </section>

    </div>

    <script>
        // Fitur tampil/sembunyikan password
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function() {
            const isHidden = passwordInput.type === 'password';

            passwordInput.type = isHidden ? 'text' : 'password';
            this.textContent = isHidden ? 'Sembunyikan' : 'Lihat';

            this.setAttribute(
                'aria-pressed',
                String(isHidden)
            );

            this.setAttribute(
                'aria-label',
                isHidden ? 'Sembunyikan password' : 'Tampilkan password'
            );
        });
    </script>


    <script>
        const roleInputs = document.querySelectorAll(
            'input[name="role"]'
        );

        const unitGroup = document.getElementById('unit-group');
        const unitInput = document.getElementById('unit');

        function updateRoleFields() {
            const selectedRole = document.querySelector(
                'input[name="role"]:checked'
            );

            const isTeknisi =
                selectedRole && selectedRole.value === 'teknisi';

            unitGroup.hidden = !isTeknisi;

            unitInput.required = Boolean(isTeknisi);
            unitInput.disabled = !isTeknisi;

            if (!isTeknisi) {
                unitInput.value = '';
            }
        }

        roleInputs.forEach(function(radio) {
            radio.addEventListener('change', updateRoleFields);
        });

        // Atur tampilan awal saat halaman dibuka
        updateRoleFields();

        // Fitur tampil/sembunyikan password tetap berfungsi
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        if (passwordInput && togglePassword) {
            togglePassword.addEventListener('click', function() {
                const isHidden = passwordInput.type === 'password';

                passwordInput.type = isHidden ? 'text' : 'password';
                this.textContent = isHidden ? 'Sembunyikan' : 'Lihat';
                this.setAttribute('aria-pressed', String(isHidden));
            });
        }
    </script>

    <script>
        // Mengatur kolom Unit Kerja berdasarkan workspace yang dipilih
        document.addEventListener('DOMContentLoaded', function() {
            const roleInputs = document.querySelectorAll(
                'input[name="role"]'
            );

            const unitGroup = document.getElementById('unit-group');
            const unitInput = document.getElementById('unit');

            function updateRoleFields() {
                const selectedRole = document.querySelector(
                    'input[name="role"]:checked'
                );

                if (!selectedRole || !unitGroup || !unitInput) {
                    return;
                }

                // Kolom Unit Kerja hanya muncul ketika memilih Unit
                const isUnit = selectedRole.value === 'unit';

                unitGroup.hidden = !isUnit;

                // Unit wajib diisi hanya untuk workspace Unit
                unitInput.required = isUnit;
                unitInput.disabled = !isUnit;

                // Kosongkan pilihan Unit ketika memilih Admin
                if (!isUnit) {
                    unitInput.value = '';
                }
            }

            // Jalankan ketika pilihan workspace berubah
            roleInputs.forEach(function(radio) {
                radio.addEventListener('change', updateRoleFields);
            });

            // Sesuaikan tampilan saat halaman pertama kali dibuka
            updateRoleFields();
        });
    </script>


</body>

</html>
