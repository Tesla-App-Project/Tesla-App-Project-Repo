<?php

final class View
{
    public static function openBuffer()
    {
        // Starting exit buffer, we call the main buffer
        ob_start();
    }

    public static function getBufferContent()
    {
        // We return content of the main buffer
        return ob_get_clean();
    }

    public static function show($S_location, $A_settings = array())
    {
        $S_file = Constants::directoryViews() . $S_location . '.php';

        $A_View = $A_settings;
        // Starting of a sub buffer
        ob_start();
        include $S_file; // A_view is used inside this file, the view is include in the sub buffer
        ob_end_flush();
    }
}
