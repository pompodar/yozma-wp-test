<?php

namespace Roots\Sage\Assets;

/**
 * Get paths for assets
 */
class JsonManifest
{
    private $manifest;
    protected static $_instance = null;

    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function init($manifest_path)
    {
        if (file_exists($manifest_path)) {
            $this->manifest = json_decode(file_get_contents($manifest_path), true);
        } else {
            $this->manifest = [];
        }
    }

    public function get()
    {
        return $this->manifest;
    }

    public function getPath($key = '', $default = null)
    {
        $collection = $this->manifest;
        if (is_null($key)) {
            return $collection;
        }
        if (isset($collection[$key])) {
            return $collection[$key];
        }
        foreach (explode('.', $key) as $segment) {
            if (!isset($collection[$segment])) {
                return $default;
            } else {
                $collection = $collection[$segment];
            }
        }
        return $collection;
    }
}

/**
 * Retrieve asset path
 */
function asset_path($filename, $local = false)
{
    $dist_path = ($local ? get_template_directory() : get_template_directory_uri()) . '/dist/';
    $directory = dirname($filename) . 'assets.php/';
    $file = $filename;


    if (array_key_exists($file, JsonManifest()->get())) {
        return $dist_path . JsonManifest()->get()[$file];
    } else {
        // if is an acf block asset
        if (substr($file, 0, 10) === "acf-blocks") {
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $dirs = [
                'js' => 'scripts',
                'css' => 'styles',
            ];
            if (isset($dirs[$ext])) {
                return $dist_path . $dirs[$ext] . '/' . $file;
            } else {
                return $dist_path . 'images/' . $file;
            }
        }

        return $dist_path . $file;
    }
}



/**
 * Public function instantiating `JsonManifest` class
 */
function JsonManifest()
{
    return JsonManifest::instance();
}


/**
 * Initiate json manifest
 */
$assets_json_path = get_template_directory() . '/dist/' . 'assets.json';
JsonManifest()->init($assets_json_path);
