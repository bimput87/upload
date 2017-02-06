<?php
/**
* Simple assets helper to simplify loading of asset files
*/
if(!defined('BASEPATH')) exit('No direct script access allowed');

function asset_url($root, $asset_name, $asset_type = NULL) {
    $obj = & get_instance();
    $base_url = $obj->config->item('base_url');
    $asset_root = $root;
    $asset_location = $base_url . $asset_root;
    if (is_array($asset_name))
    {
        $cachename = md5(serialize($asset_name));
        $asset_location .= 'cache/' . $cachename . '.' . $asset_type;
        if(!is_file($asset_root . 'cache/' . $cachename . '.' . $asset_type))
        {
            $out = fopen($asset_root . 'cache/' . $cachename . '.' . $asset_type, "w");
            foreach($asset_name as $file)
            {
                $file_content = file_get_contents($asset_root . $asset_type . '/' . $file);
                fwrite($out, $file_content);
            }
            fclose($out);
        }
    }
    else
    $asset_location .= $asset_type . '/' . $asset_name;
    return $asset_location;
}

function css_asset($root = '',$asset_name,$attributes = array()) {
    if(empty($root))
        $root = 'public/assets/';
    $attribute_str = _parse_asset_html($attributes);
    return '<link rel="stylesheet" type="text/css"' . $attribute_str . ' href="' . asset_url($root, $asset_name,'css') .'" />'."\n\t";
}

function js_asset($root = '', $asset_name) {
    if(empty($root))
        $root = 'public/assets/';
    return '<script type="text/javascript" src="' . asset_url($root, $asset_name,'js') . '"></script>'."\n\t";
}

function image_asset($root = '', $asset_name, $module_name = '', $attributes = array()) {
    if(empty($root))
        $root = 'public/assets/';
    $attribute_str = _parse_asset_html($attributes);
    return '<img src="' . asset_url($root, $asset_name,'img') . '"' . $attribute_str . ' />'."\n\t";
}

function _parse_asset_html($attributes = NULL)
{
    if (is_array($attributes)){
        $attribute_str = '';
        foreach ($attributes as $key => $value)
        $attribute_str .= ' ' . $key . '="' . $value . '"';
        return $attribute_str;
    }else
    return '';
}
