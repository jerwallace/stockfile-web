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
            'caption' => 'Stockpile your files.',
            'description' => "Here at StockFile, we believe that nothing is worth throwing out. Let's face it folks, we are hoarders by nature. So, instead of filling up your precious SSD space, let us hold your stockpile of files.",
            'loginmessage' => 'Please login using the form below.'
        ));
    }

}