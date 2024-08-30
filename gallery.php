<!DOCTYPE html>
<html>
    <head>
        <title></title>
            <h1> Club gallery </h1>
                <meta http-equiv="content-type" content="text/html; charset=UTF-8">
                <meta name="description" content="">
                <meta name="keywords" content="">
                <meta name="author" content="Antonio Košutić">
                <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
            .gallery {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 7px;
                padding-left: 10px; }

            .gallery img {
                width: 95%;
                height: auto;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease-in-out; }

            .gallery img:hover {
                transform: scale(1.8);
                max - width: 95%;
                max - height: 100vh; }
        </style>

    </head>

    <body>
        <div class="gallery">

            <?php
                $imageFolder = 'gallery/';
                if (is_dir($imageFolder)) {             
                    if ($dh = opendir($imageFolder)) {                    
                        while (($file = readdir($dh)) !== false) {                       
                            $imagePath = $imageFolder . $file;
                            if (is_file($imagePath) && in_array(pathinfo($imagePath)['extension'], ['jpg', 'jpeg', 'png', 'JPG','JPEG','PNG'])) {
                                echo '<img src="' . $imagePath . '" alt="Image" title="' . htmlspecialchars($file) . '">'; } }
                        closedir($dh); } }
            ?>
        </div>
        <br>
        
    </body>
</html>