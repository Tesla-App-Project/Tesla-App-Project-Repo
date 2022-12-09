<?php

require 'kernel/Constants.php';

final class AutoLoad
{
    public static function loadKernelClasses($S_nomDeClasse)
    {
        $S_fichier = Constants::repertoireNoyau() . "$S_nomDeClasse.php";
        return static::_load($S_fichier);
    }

    public static function loadModelsClasses($S_nomDeClasse)
    {
        $S_fichier = Constants::repertoireModele() . "$S_nomDeClasse.php";

        return static::_load($S_fichier);
    }


    public static function loadViewClasses($S_nomDeClasse)
    {
        $S_fichier = Constants::repertoireVues() . "$S_nomDeClasse.php";

        return static::_load($S_fichier);
    }

    public static function loadControllerClasses($S_nomDeClasse)
    {
        $S_fichier = Constants::repertoireControleurs() . "$S_nomDeClasse.php";

        return static::_load($S_fichier);
    }
    private static function _load($S_fichierACharger): void
    {
        if (is_readable($S_fichierACharger)) {
            require $S_fichierACharger;
        }
    }
}

// J'empile tout ce beau monde comme j'ai toujours appris à le faire...
spl_autoload_register('AutoLoad::loadKernelClasses');
spl_autoload_register('AutoLoad::loadModelsClasses');
spl_autoload_register('AutoLoad::loadViewClasses');
spl_autoload_register('AutoLoad::loadControllerClasses');
