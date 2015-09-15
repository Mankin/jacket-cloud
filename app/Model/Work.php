<?php

class Work extends AppModel
{
    public $name = 'Work';

    public $validate = array(
        'workFile' => array(
            'upload-file' => array(
                'rule' => 'uploadError',
                'message' => 'Failed to Upload Your Work.'
            ),
            'extension' => array(
                'rule' => array('extension',
                    array('gif', 'jpeg', 'png', 'jpg')
                ),
                'message' => 'Only gif, jpeg, png and jpg data is valid.'
            ),
            'mimetype' => array(
                'rule' => array('mimeType', array('image/jpeg', 'image/png', 'image/gif')),
                'message' => 'Invalid File Type.'
            )
        )
    );
}
