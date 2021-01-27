<?php
function getGallery() {
    foreach (new DirectoryIterator(DIR_ROOT . '/public/img/gallery') as $file) {
        if ($file->isFile()) {
            $galleryRequest[] = $file->getFilename();
        }
    }
    return $galleryRequest;
}
