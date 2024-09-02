<?php
function resize_image($image_temp, $new_path) {
if (is_uploaded_file($image_temp)) {
    $uploaded_image = imagecreatefromjpeg($image_temp);

    $uploaded_width = imagesx($uploaded_image);
    $uploaded_height = imagesy($uploaded_image);

    $width_ratio = $uploaded_width / 100;
    $height_ratio = $uploaded_height / 100;

    if ($width_ratio > 1 || $height_ratio > 1) {
        $ratio = max($width_ratio, $height_ratio);
        $new_height = round($uploaded_height / $ratio);
        $new_width = round($uploaded_width / $ratio);

        $new_image = imagecreatetruecolor($new_width, $new_height);

        $new_x = 0;
        $new_y = 0;
        $uploaded_x = 0;
        $uploaded_y = 0;
        imagecopyresampled($new_image, $uploaded_image,
                        $new_x, $new_y, $uploaded_x, $uploaded_y,
                        $new_width, $new_height, $uploaded_width, $uploaded_height);

   
        $image_path = 'images/' . $_FILES['image']['name'];
        imagejpeg($new_image, $new_path);
        imagedestroy($new_image);
    } else {
        $image_path = 'images/' . $_FILES['image']['name'];
        move_uploaded_file($image_temp, $image_path);
    }
} else {
        echo "Your image did not upload";
    }
}
?>