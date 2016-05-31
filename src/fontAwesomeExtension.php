<?php

namespace Bolt\Extension\boltabandoned\fontawesomehelper;

use Bolt\Extension\SimpleExtension;

class fontAwesomeExtension extends SimpleExtension
{

    protected function registerTwigFunctions()
    {
        return [
            'fa' => 'fontAwesome',
            'fasrc' => 'fontAwesomeSource',
            'fai' => 'fontAwesomeInline'
        ];
    }

    public function isSafe()
    {
        return true;
    }

    public function fontAwesome($icon = 'fire', $color = 'black', $size = 18)
    {
        $assetFile = $color . '/' . $icon . '.svg';
        $path = $this->getWebDirectory()->getFile($assetFile)->getPath();

        $format = '<img src="/%s" alt="Icon depicting %s" width="%d" class="fa-icon">';

        $str = sprintf($format, $path, $icon, $size);

        return new \Twig_Markup($str, 'UTF-8');
    }
    
    public function fontAwesomeSource($icon = 'fire', $color = 'black')
    {
        $assetFile = $color . '/' . $icon . '.svg';
        $path = $this->getWebDirectory()->getFile($assetFile)->getPath();

        return '/'.$path;
    }

    public function fontAwesomeInline($icon = 'fire', $color = 'black', $size = 18)
    {
        $assetFile = $color . '/' . $icon . '.svg';
        $file = $this->getWebDirectory()->getFile($assetFile)->read();

        $svg = new \SimpleXMLElement($file);

        $svg['role'] = 'img';
        $svg['width'] = $size;
        $svg['height'] = $size;
        $svg['class'] = 'fa-icon';
        $svg['aria-label'] = 'Icon depicting ' . $icon;

        $str = $svg->asXML();

        $str = substr($str, strpos($str, '?>') + 2);

        return new \Twig_Markup($str, 'UTF-8');
    }
}
