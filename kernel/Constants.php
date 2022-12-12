<?php

// Rappel : nous sommes dans le répertoire Core, voilà pourquoi dans realpath je "remonte d'un cran" pour faire référence
// à la VRAIE racine de mon application

final class Constants
{
    // Les constantes relatives aux chemins

    public const DIRECTORY_VIEWS       = '/View/';

    public const DIRECTORY_MODEL       = '/model/';

    public const DIRECTORY_KERNEL      = '/kernel/';

    public const DIRECTORY_CONTROLLERS = '/controller/';

    public const DIRECTORY_EXCEPTIONS  = '/kernel/Exceptions/';


    public static function rootDirectory()
    {
        return realpath(__DIR__ . '/../');
    }

    public static function kernelRepertory()
    {
        return self::rootDirectory() . self::DIRECTORY_KERNEL;
    }

    public static function directoryViews()
    {
        return self::rootDirectory() . self::DIRECTORY_VIEWS;
    }

    public static function directoryModel()
    {
        return self::rootDirectory() . self::DIRECTORY_MODEL;
    }

    public static function directoryExceptions()
    {
        return self::rootDirectory() . self::DIRECTORY_EXCEPTIONS;
    }

    public static function directoryControllers()
    {
        return self::rootDirectory() . self::DIRECTORY_CONTROLLERS;
    }
}
