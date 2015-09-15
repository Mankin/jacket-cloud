<?php

App::uses('AppController', 'Controller');

class StreamsController extends AppController
{
    public $name = 'Streams';
    public $uses = array('Work', 'User');
    public $autoLayout = true;
    public $layout = 'usual';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
        if ($this->Auth->loggedIn()) {
            $this->Session->setFlash(__('ログインしています。'));
        } else {
            $this->Session->setFlash(__('ログインしていません。'));
        }
    }

    public function index()
    {
        $worksList = $this->Work->find('all', array(
            'fields' => 'Work.name'
        ));
        $this->set(compact('worksList'));
    }
}
