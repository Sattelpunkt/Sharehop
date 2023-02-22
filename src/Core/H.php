<?php

namespace Core;

class H
{

    public static function dnd(array $data): void
    {
        echo "<pre>";
        print_r($data);
        echo "</pre><br />";
        echo "Programm has stopped";
    }

}