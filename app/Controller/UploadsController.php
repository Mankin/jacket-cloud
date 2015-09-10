<?php

class UploadsController extends AppController
{
    public $uses = array();

    public $layout = null;

    const UPLOAD_FILE_PASS = IMAGES . 'works/';

    public function index()
    {
        $this->uses = array('Work');
        if ($this->request->is('post')) {
            /*
            * POSTデータがあるとき
            */
            $this->Work->set($this->request->data);
            // 画像バリデーション
            if ($this->Work->validates(array('fieldList' => array('workFile')))) {
                // ファイル名セット
                $filename = md5(microtime()) . $this->request->data['Work']['file']['name'];
                // アップロード
                if (move_uploaded_file($this->request->data['Work']['file']['tmp_name'], self::UPLOAD_FILE_PASS . $filename)) {
                    $work = array(
                        'Work' => array(
                            'name' => $filename
                        )
                    );
                    if ($this->Work->save($work, array( 'validate' => false))) {
                    } else {
                        // saveエラー
                        return false;
                    }
                } else {
                    // アップロードエラー
                    return false;
                }
            } else {
                // バリデーションエラー
                return false;
            }
        }
    }
}
