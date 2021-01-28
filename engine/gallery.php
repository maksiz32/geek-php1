<?php
function getGallery() {
    $avEx = ['jpg', 'jpeg', 'bmp', 'gif', 'png'];
    foreach (new DirectoryIterator(DIR_ROOT . '/public/img/gallery') as $file) {
        if ($file->isFile() && (in_array($file->getExtension(), $avEx))) {
            $galleryRequest[] = $file->getFilename();
        }
    }
    return $galleryRequest;
}
