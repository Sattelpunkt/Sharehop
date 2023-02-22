<?php

namespace Core;

use Config\BaseConfig;
use Core\Session;

class BaseResponse
{

    private string $content;
    private string $siteTitel;
    private string $contentPath;
    private array $output = [];

    public function __construct()
    {
        $this->siteTitel = BaseConfig::$config['default_site_title'];
        $this->output['year'] = BaseConfig::$config['App_year'];
        $this->output['autor'] = BaseConfig::$config['App_autor'];
    }

    public function setContentTemplate(string $class, string $content): void
    {
        $class = strstr($class, 'Service', TRUE);
        $class .= "Response" . "\\";
        $this->contentPath = str_replace("\\", "/", $class);
        $this->content = $content;
    }

    public function __set(string|array $name, string|array $value): void
    {
        $this->output[$name] = $value;
    }

    public function __get($name): string|array
    {
        return $this->output[$name];
    }

    public function render(): void
    {
        extract($this->output);

        ob_start();

        $fullPath = SRC . DS . $this->contentPath . $this->content . ".phtml";

        if (file_exists($fullPath)) {
            include($fullPath);
        } else {
            echo "<br /><b>Fehler:</b> Content wurde nicht gefunden";
            #ToDo Weiterleitung auf Error;
        }
    }

    public function renderPart(string $name): void
    {
        $fullPath = PROOT . DS . 'public' . DS . 'assets' . DS . 'parts' . DS . $name . ".phtml";

        if (file_exists($fullPath)) {
            include($fullPath);
        } else {
            echo "<br /><b>Fehler:</b> Part wurde nicht gefunden";
            #ToDo Weiterleitung auf Error;
        }
    }

    public function displayMSG() : void
    {
        foreach (Session::getMSGs() as $key => $values) {
            foreach ($values as $value) {
                echo '
                <div class="alert alert-' . $key . '" role="alert">
                <center>' . $value . '</center>
                </div>
                ';
            }
        }
        Session::deleteMSGs();
    }


}