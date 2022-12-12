<?php

// Rappel : nous sommes dans le répertoire Core, voilà pourquoi dans realpath je "remonte d'un cran" pour faire référence
// à la VRAIE racine de mon application

final class Constantes
{
    // Les constantes relatives aux chemins

    public const REPERTOIRE_VIEWS       = '/View/';

    public const REPERTOIRE_MODELE      = '/model/';

    public const REPERTOIRE_NOYAU       = '/kernel/';

    public const REPERTOIRE_CONTROLEURS = '/controller/';

    public const REPERTOIRE_EXCEPTIONS  = '/kernel/Exceptions/';


    public static function repertoireRacine()
    {
        return realpath(__DIR__ . '/../');
    }

    public static function kernelRepertory()
    {
        return self::repertoireRacine() . self::REPERTOIRE_NOYAU;
    }

    public static function repertoireViews()
    {
        return self::repertoireRacine() . self::REPERTOIRE_VIEWS;
    }

    public static function directoryModel()
    {
        return self::repertoireRacine() . self::REPERTOIRE_MODELE;
    }

    public static function repertoireExceptions()
    {
        return self::repertoireRacine() . self::REPERTOIRE_EXCEPTIONS;
    }

    public static function repertoireControleurs()
    {
        return self::repertoireRacine() . self::REPERTOIRE_CONTROLEURS;
    }
}
