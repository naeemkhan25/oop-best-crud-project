<?php
namespace wedevs;

/**
 * the Frontend All class.
 */

class Frontend{
    public function __construct()
    {
        new Frontend\Shortcode();
        new Frontend\Enquire();
    }
}