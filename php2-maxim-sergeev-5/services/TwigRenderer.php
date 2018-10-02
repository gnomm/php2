<?php
namespace app\services;

use app\interfaces\IRenderer;
use Twig_Loader_Filesystem;
use Twig_Environment;

class TwigRenderer implements IRenderer
{
    public function render($template, $params = [])
    {
//        ob_start();
//        extract($params);

        $loader = new Twig_Loader_Filesystem (ROOT_DIR . 'templates');
        $twig = new Twig_Environment($loader, array(
            'cache' => false,
        ));
        $twig = $twig->load($template . ".html.twig");
        echo $twig->render($params);
//        echo $twig->render(array('name' => 'Maxim Sergeev'));
//        return ob_get_clean();
    }
}
