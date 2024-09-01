<?php

namespace App\Helpers;

class ModuleHelper
{
    public function generateCode($module)
    {
        $module = strtoupper(substr($module, 0, 2));
        return $module;
    }
}
