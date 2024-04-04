<?php

namespace ImageUploader;

use function Controller\app;

class ImageUploader
{
    public function upload(array $image): string
    {
        if (!empty($image['image'])) {
            $root = \app()->settings->getRootPath();
            $path = $_SERVER['DOCUMENT_ROOT']. $root. '/public/img/';
            $name = $image['image']['name'];

            move_uploaded_file($image['image']['tmp_name'], $path. $name);

            return $name;
        }

        return '';
    }
}