<?php

class StreamsController extends AppController
{
    public $uses = array('Work');

    public $layout = 'usual';

    public function index()
    {
        $worksList = $this->Work->find('all', array(
            'fields' => 'Work.name'
        ));
        $this->set(compact('worksList'));
    }
}
