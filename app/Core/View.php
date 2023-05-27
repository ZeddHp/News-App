<?php declare(strict_types=1);

namespace App\Core;

class View
{
    //path to the template file
    private string $templatePath;


    //parameters to be passed to the template
    private array $parameters = [];


    //constructor
    public function __construct(string $templatePath, array $parameters = [])
    {
        $this -> templatePath = $templatePath;
        $this -> parameters = $parameters;
    }

    public function getTemplatePath(): string
    {
        return $this -> templatePath;
    }

    public function getParameters(): array
    {
        return $this -> parameters;
    }

}