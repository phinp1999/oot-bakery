<?php

namespace App;

/**
 * Base controller
 *
 * @property-read \App\Pixie $pixie Pixie dependency container
 */
class Page extends \PHPixie\Controller {

    protected $view;

    public function before(){

        //This is our main page layout

        $this->view = $this->pixie->view('main');

    }

    public function after(){

        $this->response->body = $this->view->render();

    }

    protected function logged_in(){
        $array_user = $this->pixie->session->get('user');

        if(empty($array_user)){
            return false;
        }

        return true;
    }

}