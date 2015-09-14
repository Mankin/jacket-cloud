<?php
App::uses('AppController', 'Controller');
App::import('vendor', 'facebook/php-sdk/src/facebook');

class UsersController extends AppController
{
    public $uses = array();
    public $name = 'Users';
    public $autoLayout = true;
    public $layout = 'users';
    public $facebook;

    function index(){}

    public function beforeFilter()
    {
        $this->facebook = new Facebook(array(
            'appId' => '118839265134750',
            'secret' => '0a45828d231da88fbd3d65d371ba59c7',
            'cookie' => true,
        ));
        //$this->Auth->allow('login', 'logout');
    }

    public function facebook(){//facebookの認証処理部分
        $this->autoRender = false;
        $user = $this->facebook->getUser();//ユーザ情報取得
        if($user){//認証後の処理
            $me = $this->facebook->api('/me');//ユーザ情報取得
            $this->Session->write('mydata',$me);//fbデータをセッションに保存
            $this->User->save(array(
                'User' => array(
                    'name' => $me['name']
                )
            ));
            $this->redirect(array(
                'controller' => 'streams',
                'action'     => 'index'
            ));
        }else{//認証前の処理
            $url = $this->facebook->getLoginUrl(array(
                        'scope' => 'user_birthday'
                        ,'canvas' => 1,'fbconnect' => 0));
            $this->redirect($url);
        }
    }

    function showdata(){//トップページ
        $facebook = $this->createFacebook(); //セッション切れ対策 (?)
        $myFbData = $this->Session->read('mydata');//facebookのデータ
    }

    //private function createFacebook() {//appID, secretを記述
    //    return new Facebook(array(
    //        'appId' => '118839265134750',
    //        'secret' => '0a45828d231da88fbd3d65d371ba59c7'
    //    ));
    //}
    public function logout() {
        $this->facebook->destroySession();
        $this->redirect(
            array('controller' => 'streams', 'action' => 'index')
        );
    }
}
