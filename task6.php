<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <img alt="test image" src="<?php echo $im;?>"> 
        <?php
            ob_clean();
            header("Content-type: image/png");
            $im = imagecreate(200,160);

            $blue = imagecolorallocate($im, 0, 32, 255);
            $green = imagecolorallocate($im, 93, 225, 66);
            $yellow = imagecolorallocate($im, 238, 253, 21);
            $red = imagecolorallocate($im, 245, 52, 52);
            $points = []; //cia turetu buti masyvas su zvaigzdutes kampu koordinatemis
            $day = date("Y-m-d h:i");

            imagereactangle($im, 0, 0, 200, 40, $blue);
            imagereactangle($im, 0, 80, 200, 120, $green);
            imagereactangle($im, 0, 120, 200, 160, $yellow);
            imagereactangle($im, 80, 0, 120, 160, $red);

            imagefilledpolygon($im, $points, 5, $yellow);

            imagestring($im, 10, 160, 140, $day, $blue);

            imagepng($im);
            imageDestroy($im);
        ?>
    </body>
</html>
