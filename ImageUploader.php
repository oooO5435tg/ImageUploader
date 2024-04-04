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
            $extension = pathinfo($image['image']['name'], PATHINFO_EXTENSION);
            $randomName = uniqid() . '.' . $extension;

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            move_uploaded_file($image['image']['tmp_name'], $path. $randomName);

            return $randomName;
        }

        return '';
    }
}