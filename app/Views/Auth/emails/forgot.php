<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            border: 0;
        }

        body {
            font-family: 'Lato', sans-serif;
            background-color: #d5dbdb;
            font-size: 18px;
            max-width: 700px;
            margin: 0 auto;
            padding: 1%;
            color: #565859;
        }

        .wrapper {
            background: #fff;
            box-shadow: 0 0 18px #666;
            border-radius: 8px 8px 0 0;
        }

        .social li {
            display: inline;
        }

        .social img {
            max-width: 60px;
            margin-right: 3px;
            margin-left: 3px;
        }

        .two-col {
            margin: 10px 0 26px;
            float: left;
            width: 46%;
            padding: 5% 2%;
        }

        .btn,
        .btn-2 {
            background: skyblue;
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 10px 14px;
            border-radius: 8px;
            letter-spacing: 2px;
        }

        .btn-2 {
            background: #3ca708;
        }

        h2 {
            letter-spacing: 1px;
            padding-bottom: 15px;
        }

        p {
            line-height: 28px;
            padding-bottom: 25px;
        }

        .line {
            clear: both;
            height: 1px;
            background-color: #303840;
            margin: 15px auto 10px;
            width: 90%;
        }

        .three-col {
            margin: 10px 0 26px;
            float: left;
            width: 29.3%;
            padding: 5% 2%;
            text-align: center;
        }

        .three-col img {
            border-radius: 50%;
            max-width: 100px;
            padding-top: 2%;
        }

        .contact {
            text-align: center;
            padding: 6%;
        }

        @media(max-width: 600px) {
            body {
                padding: 1%;
            }

            .three-col .two-col {
                min-width: 96%;
                margin: 0 0 15px !important;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">

        <div class="two-col">
            <h2>Reset Password</h2>
            <p>Seseorang meminta pengaturan ulang kata sandi di alamat email ini untuk <?= site_url() ?>.</p>
            <p>Untuk mengatur ulang kata sandi, gunakan kode atau URL ini dan ikuti petunjuknya.</p>
            <p>Kode Anda: <?= $hash ?></p>
            <br>
            <div class="button-holder">
                <a href="<?= url_to('reset-password') . '?token=' . $hash ?>" class="btn">Formulir Atur Ulang Password</a>.
            </div>
            <br>
            <p>Jika Anda tidak meminta pengaturan ulang kata sandi, Anda dapat mengabaikan email ini dengan aman.</p>
        </div>



</body>

</html>