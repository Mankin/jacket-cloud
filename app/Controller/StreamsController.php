<?php
class StreamsController extends AppController
{
    public $name = 'Streams';
    public $uses = array('Work');
    public $autoLayout = true;

    public $layout = 'usual';

    public function index()
    {
        $worksList = $this->Work->find('all', array(
            'fields' => 'Work.name'
        ));
        $this->set(compact('worksList'));
    }
}
