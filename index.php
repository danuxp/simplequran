<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>

                        <?php
                        include 'config.php';

                        $url = "https://raw.githubusercontent.com/penggguna/QuranJSON/master/quran.json";
                        // $url = "https://quran-endpoint.vercel.app/" . $service . "/" . $param . "/";
                        $data = file_get_contents($url);
                        $res = json_decode($data, TRUE);

                        // $quran = tes();

                        var_dump($res);

                        // var_dump($quran);
                        for ($i = 1; $i <= 114; $i++) {
                            $surat = quran("surat", $i);
                            // var_dump($surat);
                        }
                        // $i = 11;

                        foreach ($quran['data'] as $row) {
                            // var_dump($row['nama']);
                            echo '<div class="card">
                            <div class="card-body">'
                                . $row['number'] .
                                '</div>
                          </div>';
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>