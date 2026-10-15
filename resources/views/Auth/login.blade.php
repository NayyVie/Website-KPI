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
            flex: 0 0 42%;
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


        .visual-content {
            position: relative;
            z-index: 2;
            padding: clamp(28px, 4vw, 58px);
            color: #fff;
            max-width: 650px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 48px;
        }

        .brand-logo {
            width: 42px;
            height: 42px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .brand-name {
            font-size: 19px;
            line-height: 1.35;
            font-weight: 700;
        }

        .brand-subtitle {
            font-size: 11px;
            font-weight: 400;
            letter-spacing: 0.3px;
        }

        .visual-content h1 {
            font-size: clamp(27px, 3vw, 43px);
            line-height: 1.3;
            font-weight: 700;
            letter-spacing: -0.8px;
            max-width: 500px;
            text-shadow: 0 2px 14px rgba(0, 40, 75, 0.15);
        }

        .visual-content p {
            margin-top: 15px;
            max-width: 390px;
            font-size: 13px;
            line-height: 1.8;
            color: #f1fbff;
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


        .form-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 22px;
        }

        .form-brand img {
            width: 32px;
            height: 32px;
            object-fit: contain;
        }

        .form-brand strong {
            display: block;
            color: var(--navy);
            font-size: 11px;
            font-weight: 700;
        }

        .form-brand span {
            display: block;
            color: var(--muted);
            font-size: 9px;
            margin-top: 2px;
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

        .button-arrow {
            font-size: 18px;
            line-height: 1;
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

            .visual-content {
                padding: 30px;
            }

            .visual-content h1 {
                font-size: 29px;
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
                padding: 12px;
            }

            .login-container {
                height: calc(100vh - 24px);
                min-height: 580px;
            }

            .visual-content {
                padding: 30px;
            }

            .brand {
                margin-bottom: 30px;
            }

            .login-side {
                padding-top: 22px;
                padding-bottom: 22px;
            }

            .form-brand {
                margin-bottom: 14px;
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
    </style>
</head>

<body>

    <div class="login-container">

        <!-- SISI KIRI -->
        <section class="login-visual">
            <div class="visual-content">

                <div class="brand">
                    <!-- Ganti dengan lokasi logo milikmu -->
                    {{-- <img class="brand-logo" src="{{ asset('assets/images/backgroundKPI.png') }}" alt="Logo PLN"> --}}

                    {{-- <div>
                        <div class="brand-name">PLN</div>
                        <div class="brand-subtitle">
                            Nusantara Power Services
                        </div>
                    </div> --}}
                </div>

                {{-- <h1>
                    Grow Performance,<br>
                    Power Excellence
                </h1> --}}

                {{-- <p>
                    Platform pengelolaan material untuk mendukung
                    pelaporan, pemeriksaan, dan pengembalian
                    Ex Barang secara terstruktur.
                </p> --}}

            </div>
        </section>

        <!-- SISI KANAN -->
        <section class="login-side">
            <div class="login-form">

                <div class="form-brand">
                    <img src="#" alt="Logo PLN">

                    <div>
                        <strong>PLN Nusantara Power Services</strong>
                        <span>Logistic &amp; System</span>
                    </div>
                </div>

                <h2 class="form-heading">Selamat Datang</h2>

                <p class="form-description">
                    Masuk untuk mengakses sistem pengelolaan Ex Barang.
                </p>

                <form action="#" method="POST">
                    @csrf

                    <label class="field-label">Pilih Workspace</label>

                    <div class="role-switch">
                        <label class="role-option">
                            <input type="radio" name="role" value="teknisi" checked>
                            <span>Teknisi</span>
                        </label>

                        <label class="role-option">
                            <input type="radio" name="role" value="admin_gudang">
                            <span>Admin Gudang</span>
                        </label>
                    </div>


                    <!-- PILIHAN UNIT: MUNCUL HANYA UNTUK TEKNISI -->
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
                            <option value="Unit Surabaya">
                            <option value="Unit Jakarta">
                            <option value="Unit Bandung">
                            <option value="Unit Semarang">
                            <option value="Unit Yogyakarta">
                            <option value="Unit Malang">
                            <option value="Unit Bali">
                            <option value="Unit Makassar">
                            <option value="Unit Medan">
                            <option value="Unit Palembang">
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
                        <span class="button-arrow" aria-hidden="true">→</span>
                    </button>

                    <p class="register-text">
                        Belum punya akun?
                        <a href="#" class="form-link">
                            Hubungi administrator
                        </a>
                    </p>

                </form>

                <div class="form-footer">
                    <span>PLN Nusantara Power Services · Logistic &amp; System</span>
                    <span>Ex Barang System</span>
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

</body>

</html>
