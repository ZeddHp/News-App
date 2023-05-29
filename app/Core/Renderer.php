<?php declare(strict_types=1);

namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Renderer
{
    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(dirname(__DIR__, 2) . '/app/Views');
        $this->twig = new Environment($loader);
        $this->twig->addGlobal('session', $_SESSION);
    }

    public function render(View $view): string
    {
        return $this->twig->render($view->getTemplatePath().'.twig', $view->getParameters());
    }
}