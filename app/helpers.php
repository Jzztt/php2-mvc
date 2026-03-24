<?php

use eftec\bladeone\BladeOne;

// echo $blade->run("hello", array("variable1" => "value1"));
// function('hello', $data = ['variable1'=> "value1"])
function view($view, $data = [])
{
    $views =  __DIR__ . '/resource/views';
    $cache = __DIR__ . '/storage/cache';
    $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
    echo $blade->run($view, $data);
}

function route($route)
{
    return $_ENV['APP_URL']  . $route;
}

function redirect($path)
{
    return header("Location: " . route($path));
    die;
}

function upload_file($file, $folder = null)
{
    $fileTmpPath = $file['tmp_name'];
    $fileName = time() . '-' . $file['name'];

    $uploadDir = 'storage/' . $folder . '/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $desPath = $uploadDir . $fileName;

    if (move_uploaded_file($fileTmpPath, $desPath)) {
        return  $desPath;
    }
    throw new Exception('Lỗi upload file');
}
