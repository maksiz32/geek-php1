<?php
function getGallery() {
    $avalableEx = ['jpg', 'jpeg', 'bmp', 'gif', 'png'];
    foreach (new DirectoryIterator(DIR_ROOT . '/img/gallery') as $file) {
        if ($file->isFile() && (in_array($file->getExtension(), $avalableEx))) {
            $galleryRequest[] = $file->getFilename();
        }
    }
    return $galleryRequest;
}
