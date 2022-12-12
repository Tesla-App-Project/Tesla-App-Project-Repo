<?php

require 'kernel/Constantes.php';

final class AutoLoad
{
    public static function LoadKernelClass($S_className)
    {
        $S_file = Constantes::kernelRepertory() . "$S_className.php";
        return static::_load($S_file);
    }

    public static function loadClassModel($S_className)
    {
        $S_file = Constantes::directoryModel() . "$S_className.php";

        return static::_load($S_file);
    }

    public static function chargerClassesException($S_className)
    {
        $S_file = Constantes::repertoireExceptions() . "$S_className.php";

        return static::_load($S_file);
    }

    public static function chargerClassesView($S_className)
    {
        $S_file = Constantes::repertoireViews() . "$S_className.php";

        return static::_load($S_file);
    }

    public static function chargerClassesControleur($S_className)
    {
        $S_file = Constantes::repertoireControleurs() . "$S_className.php";

        return static::_load($S_file);
    }
    private static function _load($S_file)
    {
        if (is_readable($S_file)) {
            require $S_fileToLoad;
        }
    }
}

// J'empile tout ce beau monde comme j'ai toujours appris à le faire...
spl_autoload_register('AutoLoad::LoadKernelClass');
spl_autoload_register('AutoLoad::chargerClassesException');
spl_autoload_register('AutoLoad::loadClassModel');
spl_autoload_register('AutoLoad::chargerClassesView');
spl_autoload_register('AutoLoad::chargerClassesControleur');
