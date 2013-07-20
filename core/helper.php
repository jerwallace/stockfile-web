<?php

/*
 * Simple helper function to render pages.
 * @author Jeremy Wallace
 * @org University of British Columbia
 * @date June 16, 2013
 */

function render($template,$vars = array()){

    // This will create variables from the array:
    extract($vars);
    include "views/$template.php";
    
}