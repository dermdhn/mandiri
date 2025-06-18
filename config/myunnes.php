<?php

return [
    /**
     * Tahun awal aplikasi digunakan (sesi tahun aktif)
     */
    'thn_awal'      => env('TAHUN_AWAL', 2022),
    /**
     * Tahun akhir pergantian sesi tahun aktif
     */
    'thn_akhir'     => env('TAHUN_AKHIR', date('Y')+1),
    /**
     * Mapping postfix route name dengan privilege di database
     */
    'map_privileges'    => [
        'read' 		=> ['index','view','read'],
        'create' 	=> ['create','insert','store'],
		'update'	=> ['edit','update'],
		'delete'	=> ['delete','hapus'],
        'validate'	=> ['validate']
    ],
    /**
     * Data referensi nama bulan
     * Ambil dari lang.date
     */
    'ref_bulan'	=> [
        1   =>'date.jan',
        2   =>'date.feb',
        3   =>'date.mar',
        4   =>'date.apr',
        5   =>'date.may',
        6   =>'date.jun',
        7   =>'date.jul',
        8   =>'date.aug',
        9   =>'date.sep',
        10  =>'date.okt',
        11  =>'date.nov',
        12  =>'date.des'
    ],
    /**
     * Data referensi nama bulan singkat (ex: Jan, Feb, Mar dst)
     * Ambil dari lang.date
     */
    'ref_bulan_singkat'	=> [
        1   =>'date.jan_short',
        2   =>'date.feb_short',
        3   =>'date.mar_short',
        4   =>'date.apr_short',
        5   =>'date.may_short',
        6   =>'date.jun_short',
        7   =>'date.jul_short',
        8   =>'date.aug_short',
        9   =>'date.sep_short',
        10  =>'date.okt_short',
        11  =>'date.nov_short',
        12  =>'date.des_short',
    ],
    /**
     * Data referensi nama Hari dengan format key date('D')
     */
    'hari'	        => ['Sun'=>'date.sun','Mon'=>'date.mon','Tue'=>'date.tue','Wed'=>'date.wed','Thu'=>'date.thu','Fri'=>'date.fri','Sat'=>'date.sat'],
    /**
     * Data referensi nama Hari dengan format key date('N')
     */
    'hari_2'	    => ['1'=>'date.mon','2'=>'date.tue','3'=>'date.wed','4'=>'date.thu','5'=>'date.fri','6'=>'date.sat','7'=>'date.sun'],
    /**
     * Default status untuk queue (job)
     */
    'sts_process'    => [
        0   => 'utils.process_queue',
        1   => 'utils.process_success',
        2   => 'utils.process_in_progress',
        3   => 'utils.process_retry',
        9   => 'utils.process_failed'
    ],
    /**
     * Default bootstrap class untuk tahapan proses queue
     */
    'class_process' => [
        0   => 'warning',
        1   => 'success',
        2   => 'info',
        3   => 'warning',
        9   => 'danger'
    ],
    /**
     * Default status validasi data
     */
    'sts_valid' => [
        0   => 'Ajuan',
        1   => 'Valid',
        2   => 'Ditolak'
    ],
    /**
     * Default bootstrap class untuk validasi data
     */
    'class_valid'   => [
        0   => 'warning',
        1   => 'success',
        2   => 'danger'
    ],
    /**
     * Boolean option
     */
    'str_boolean'   => [
        'ya_tidak'  => [
            0   => 'utils.bool_no',
            1   => 'utils.bool_yes'
        ],
        'aktif'     => [
            0   => 'utils.bool_inactive',
            1   => 'utils.bool_active'
        ],
        'sudah'     => [
            0   => 'utils.bool_not_yet',
            1   => 'utils.bool_yet'
        ],
        'valid'     => [
            0   => 'utils.bool_invalid',
            1   => 'utils.bool_valid'
        ],
        'ada'       => [
            1   => 'utils.bool_exist',
            0   => 'utils.bool_not_exist'
        ],
        'sesuai'    => [
            1   => 'utils.bool_match',
            0   => 'utils.bool_not_match',
        ],
        'tampil'    => [
            1   => 'utils.bool_show',
            0   => 'utils.bool_hide',
        ],
    ],
    /**
     * Default class boolean
     */
    'class_boolean' => [
        0   => 'danger',
        1   => 'success'
    ],
    /**
     * Alert Properties
     * type => [0 => header_text, 1 => header_icon]
     */
    'alert' => [
        'danger'    => ['alert.header_danger', 'bi-x-circle-fill'],
        'warning'   => ['alert.header_warning', 'bi-exclamation-circle-fill'],
        'success'   => ['alert.header_success', 'bi-check-circle-fill'],
        'info'      => ['alert.header_info', 'bi-exclamation-circle-fill'],
    ],
    /**
     * API Configurations
     */
    'api' => [
        'apps'      => [
            'base_url'  => env('API_APPS_URL', 'https://apps.unnes.ac.id/'),
            'username'  => env('API_APPS_USERNAME', ''),
            'password'  => env('API_APPS_PASSWORD', '')
        ],
        'services'  => [
            'base_url'  => env('API_SERVICES_URL', 'https://services.unnes.ac.id/'),
            'username'  => env('API_SERVICES_USERNAME', ''),
            'password'  => env('API_SERVICES_PASSWORD', '')
        ],
        'telegram'  => [
            'base_url'  => env('API_TELEGRAM_URL', 'https://api.telegram.org/'),
            'username'  => NULL,
            'password'  => NULL
        ],
        'base'  => [
            'base_url'  => env('MYUNNES_BASE_API_URL', 'https://api.myunnes.app/'),
            'headers'   => [
                'Authorization: Bearer '.env('MYUNNES_BASE_API_KEY', NULL)
            ],
        ],
    ],
    /**
     * Bahasa tersedia
     */
    'locale'    => [
        'id'    => 'Indonesia',
        'en'    => 'English'
    ],
    /**
     * ID APPS UNNES
     */
    'id_apps'       => env('ID_APPS', NULL),
    /**
     * Tampilkan properti & opsi Unit pada setiap user?
     */
    'show_unit'     => env('SHOW_UNIT', FALSE),
    /**
     * Tampilkan properti & opsi ganti tahun pada setiap user?
     */
    'show_tahun'    => env('SHOW_TAHUN', FALSE),
    /**
     * Custom Auth --> Membuat View & Controller Sendiri untuk login
     */
    'custom_auth'   => env('CUSTOM_AUTH', FALSE),
    /**
     * Route name untuk dashboard / setelah login
     */
    'dashboard_route' => env('DASHBOARD_ROUTE', 'dashboard.read'),
    /**
     * Route name redirect ketika logout aplikasi
     */
    'logout_redirect' => env('LOGOUT_REDIRECT', 'auth.login.view'),
    /**
     * Tampilkan info user pada sidebar (di atas menu)
     */
    'show_sidebar_user' => env('SHOW_SIDEBAR_USER', FALSE),
    /**
     * URL APPS UNNES
     */
    'apps_url'      => env('APPS_URL', 'https://apps.unnes.ac.id/'),
    /**
     * Pindahkan navbar ke bottom
     */
    'bottom_navbar' => env('BOTTOM_NAVBAR', FALSE),
    /**
     * Gunakan SUA (APPS/Pagoda)
     * Jika true, pastikan config role SUA pada menu role
     */
    'use_sua'       => env('USE_SUA', FALSE),
    /**
     * Tambah opsi / tampilan pada Navbar
     */
    'extra_navbar'  => env('EXTRA_NAVBAR', NULL),
    /**
     * Tampilkan kolom search menu
     */
    'filterable_menu'   => env('FILTERABLE_MENU', FALSE),
    /**
     * Perbolehkan robot google untuk melakukan indexing pada aplikasi?
     * <meta name="robots" content="noindex">
     */
    'allow_index_google'    => env('ALLOW_GOOLGE_INDEX', FALSE),
    /**
     * Broadcast ke telegram UNNES BOT apabila terjadi error 500?
     */
    'send_error_log_unnes_bot'  => env('SEND_ERROR_LOG_UNNES_BOT', FALSE),
    /**
     * Jika send_error_log_unnes_bot = true, siapa saja yang akan menerima pesan error?
     * format csv. ex: 97030518111558,97030518111559,dst
     */
    'unnes_telegram_bot_receiver'   => env('UNNES_TELEGRAM_BOT_RECEIVER', NULL),
    /**
     * Broadcast ke telegram PRIVATE BOT apabila terjadi error 500?
     */
    'send_error_log_custom_bot' => env('SEND_ERROR_LOG_CUSTOM_BOT', FALSE),
    /**
     * Token Bot Telegram yang akan dibroadcast
     * ex: 12837128937:ASdasj343SA-12312ssa
     */
    'custom_telgram_bot_token'      => env('CUSTOM_TELEGRAM_BOT_TOKEN', NULL),
    /**
     * Chat ID Telgram Bot
     * ex: @bored_cast
     */
    'custom_telgram_bot_chat_id'    => env('CUSTOM_TELEGRAM_BOT_CHAT_ID', NULL),
    /**
     * Auto assign role ketika dosen login (tanpa harus menambahkan ke user terlebih dahulu)
     */
    'auto_role_dosen'   => env('AUTO_ROLE_DOSEN', FALSE),
    /**
     * Auto assign role ketika dosens/dosen luar login (tanpa harus menambahkan ke user terlebih dahulu)
     */
    'auto_role_dosens'  => env('AUTO_ROLE_DOSENS', FALSE),
    /**
     * Auto assign role ketika dosens/dosen luar luar login (tanpa harus menambahkan ke user terlebih dahulu)
     */
    'auto_role_dosenluar'   => env('AUTO_ROLE_DOSENS', FALSE),
    /**
     * Auto assign role ketika Tendik/Karyawan login (tanpa harus menambahkan ke user terlebih dahulu)
     */
    'auto_role_karyawan'=> env('AUTO_ROLE_KARYAWAN', FALSE),
    /**
     * Auto assign role ketika Admin login (tanpa harus menambahkan ke user terlebih dahulu)
     */
    'auto_role_admins'  => env('AUTO_ROLE_ADMINS', FALSE),
    /**
     * Auto assign role ketika Mahasiswa login (tanpa harus menambahkan ke user terlebih dahulu)
     */
    'auto_role_mhs'     => env('AUTO_ROLE_MHS', FALSE),
    /**
     * ID Role Dosen pada aplikasi
     * Ganti value apabila menggunakan custom id role
     */
    'id_role_dosen'     => env('ID_ROLE_DOSEN', 'de658ab1-f2de-11ed-8e38-506b8ddfbc4d'),
    /**
     * ID Role Dosens/Dosen Luar pada aplikasi
     * Ganti value apabila menggunakan custom id role
     */
    'id_role_dosens'    => env('ID_ROLE_DOSEN', 'de658ab1-f2de-11ed-8e38-506b8ddfbc4d'),
    /**
     * ID Role Dosens/Dosen Luar pada aplikasi
     * Ganti value apabila menggunakan custom id role
     */
    'id_role_dosenluar' => env('ID_ROLE_DOSEN', 'de658ab1-f2de-11ed-8e38-506b8ddfbc4d'),
    /**
     * ID Role Tendik/Karyawan pada aplikasi
     * Ganti value apabila menggunakan custom id role
     */
    'id_role_karyawan'  => env('ID_ROLE_KARYAWAN', 'f564c061-f2de-11ed-8e38-506b8ddfbc4d'),
    /**
     * ID Role Admin pada aplikasi
     * Ganti value apabila menggunakan custom id role
     */
    'id_role_admins'    => env('ID_ROLE_KARYAWAN', 'c550b638-5def-11ed-9045-acde48001122'),
    /**
     * ID Role Mahasiswa pada aplikasi
     * Ganti value apabila menggunakan custom id role
     */
    'id_role_mhs'       => env('ID_ROLE_MHS', 'ff249dbb-f2de-11ed-8e38-506b8ddfbc4d'),
    /**
     * Menampilkan Menu Dashboard pada aplikasi
     */
    'show_dashboard_menu'   => env('SHOW_DASHBOARD_MENU', false),
    /**
     * Mengaktifkan login using google, pastikan sudah install socialite
     */
    'enable_google_login'   => env('ENABLE_GOOGLE_LOGIN', false),
    /**
     * Mengubah nama menu Dashboard pada aplikasi
     * ex: Home, Beranda, dsb
     */
    'dashboard_menu_name'   => env('DASHBOARD_MENU_NAME', 'Dashboard'),
    /**
     * Menampilkan menu MyUNNES (paling atas) dari aplikasi
     */
    'show_myunnes_menu' => env('SHOW_MYUNNES_MENU', false),
    /**
     * Menampilkan tombol forgot password, jangan lupa set MAIL_BLABLA di env
     */
    'show_forgot_password_button' => env('SHOW_FORGOT_PASSWORD_BUTTON', false),
    /**
     * Filter menu/modul yang tampil berdasarkan aplikasi
     * HANYA DIGUNAKAN APABILA dalam 1 repository terdapat banyak aplikasi
     * JIKA DIGUNAKAN, silakan tampilkan modul "Application List" pada menu
     * Sebelum mengaktifkan config ini, pastikan tabel sudah ada/jalankan "php artisan migrate"
     */
    'id_application'    => env('MYUNNES_ID_APPLICATION', NULL),
    /**
     * Base URL untuk foto profile user
     */
    'base_url_profile_pic'  => env('MYUNNES_BASE_URL_PROFILE_PIC', NULL),
    /**
     * Placeholder URL untuk foto profile user jika tidak ada base_url_profile_pic
     */
    'placeholder_url_profile_pic'  => env('MYUNNES_PLACEHOLDER_URL_PROFILE_PIC', 'https://dummyimage.com/100x100/eee/'),
    /**
     * Menampilkan tombol reset password setelah login
     */
    'show_change_password' => env('SHOW_CHANGE_PASSWORD', false),
    /**
     * Mengatur warna topbar
     * dark | light
     */
    'topbar_color' => env('TOPBAR_COLOR', 'light'),
    /**
     * God level access, for impersonate and log spy
     */
    'gods' => explode(',', env('GOD_LEVELS', '')),
];
