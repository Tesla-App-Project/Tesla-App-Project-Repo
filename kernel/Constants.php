<?php

// Rappel : nous sommes dans le répertoire Core, voilà pourquoi dans realpath je "remonte d'un cran" pour faire référence
// à la VRAIE racine de mon application

final class Constants
{
    // Les constantes relatives aux chemins

    const REPERTOIRE_VUES        = '/view/';

    const REPERTOIRE_MODELE      = '/model/';

    const REPERTOIRE_NOYAU       = '/kernel/';

    const REPERTOIRE_CONTROLEURS = '/controller/';


    public static function repertoireRacine(): bool|string
    {
        return realpath(__DIR__ . '/../');
    }

    public static function repertoireNoyau() {
        return self::repertoireRacine() . self::REPERTOIRE_NOYAU;
    }

    public static function repertoireVues() {
        return self::repertoireRacine() . self::REPERTOIRE_VUES;
    }

    public static function repertoireModele() {
        return self::repertoireRacine() . self::REPERTOIRE_MODELE;
    }

    public static function repertoireControleurs() {
        return self::repertoireRacine() . self::REPERTOIRE_CONTROLEURS;
    }


}