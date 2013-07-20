<?php

/*
 * This controller renders the home page.
 * @author Jeremy Wallace
 * @org University of British Columbia
 * @date June 16, 2013
 */

class HomeController {

    public function handleRequest() {
        render('home', array(
            'title' => 'Welcome to StockFile!',
            'caption' => 'Please login to check out your files.'
        ));
    }

}