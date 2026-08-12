<!DOCTYPE html>
<html>

<head>
    <title>RESERVASI KPMC DF</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="icon" href="<?= base_url() ?>/images/logo1.png">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
    .admin-welcome-box {
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 22px 25px;
        margin: 20px 0;
        border-radius: 10px;
        background: linear-gradient(135deg, #1e88e5, #00acc1);
        color: white;
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        /* agar teks tidak keluar dari box */
    }

    .welcome-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.22);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        animation: putarIcon 3s linear infinite;
    }

    .admin-title {
        margin: 0 0 7px;
        font-size: 24px;
        font-weight: bold;
        animation: teksGeser 1s ease forwards;
    }

    .admin-text-area {
        width: 100%;
        overflow: hidden;
    }

    .admin-text {
        margin: 0;
        font-size: 14px;
        color: #ffffff;
        font-weight: 500;
        white-space: nowrap;
        display: inline-block;
        animation: teksJalanTerus 12s linear infinite;
    }

    .gambar-home-admin {
        margin-top: 25px;
        width: 100%;
        text-align: center;
        animation: gambarMuncul 1s ease-in-out;
    }

    .img-home-admin {
        width: 100%;
        max-width: 850px;
        height: 280px;
        object-fit: cover;
        border-radius: 14px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        transition: 0.3s;
    }

    .img-home-admin:hover {
        transform: scale(1.02);
    }

    .user-profile-admin {
        display: flex !important;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 8px 18px !important;
        min-width: 80px;
    }

    .foto-admin-header {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #18b7d8;
        box-shadow: 0 2px 7px rgba(0, 0, 0, 0.18);
        margin-bottom: 4px;
        transition: 0.3s;
    }

    .foto-admin-header:hover {
        transform: scale(1.12);
        border-color: #f39c12;
    }

    .logout-admin {
        font-size: 12px !important;
        color: #333 !important;
        padding: 0 !important;
        line-height: 15px !important;
        text-decoration: none !important;
    }

    .logout-admin:hover {
        color: #e74c3c !important;
    }

    @keyframes gambarMuncul {
        from {
            opacity: 0;
            transform: translateY(25px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes munculDariAtas {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes teksGeser {
        from {
            opacity: 0;
            transform: translateX(-40px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes munculTeks {
        from {
            opacity: 0;
            transform: translateY(15px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes putarIcon {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @media (max-width: 576px) {
        .admin-welcome-box {
            padding: 18px;
        }

        .admin-title {
            font-size: 18px;
        }

        .admin-text {
            font-size: 12px;
        }

        @keyframes teksJalanTerus {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    }

    html,
body {
    height: 100%;
}

.sticky-footer {
    border-top: 1px solid #e9ecef;
    background: #fff;
    width: 100%;
}

.sticky-footer .copyright {
    padding: 12px 20px;
    text-align: left;
    font-size: 14px;
    color: #6c757d;
}
</style>