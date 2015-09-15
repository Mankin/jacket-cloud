<?php

App::uses('AppController', 'Controller');
App::import('vendor', 'facebook/php-sdk/src/facebook');

class UsersController extends AppController
{
    public $uses = array();
    public $name = 'Users';
    public $autoLayout = true;
    public $layout = 'users';
    public $Facebook;

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('logout', 'login');
        $this->Facebook = new Facebook(array(
            'appId' => '118839265134750',
            'secret' => '0a45828d231da88fbd3d65d371ba59c7',
            'cookie' => true,
        ));
    }

    public function index() {
        if ($this->Auth->loggedIn()) {
            $facebookId = $this->Facebook->getUser();
            //$this->set('user', $this->User->find('first', ['conditions' => ['User.id' => $facebookId]]));
        } else {
            $this->redirect(array(
                'controller' => 'streams',
                'action'     => 'index'
            ));
        }
    }

    public function login() {
        $this->autoRender = false;
        // facebook OAuth login
        $facebookId = $this->Facebook->getUser();
        if (!$facebookId) {
            $this->_authFacebook();
        }

        $user = $this->User->find('first', array(
            'conditions' => array('User.id_facebook' => $facebookId)
        ));
        if (empty($user['User'])) {
            $this->_add();
        } else {
            if ($this->Auth->login($user['User']['name'])) {
                return $this->redirect($this->Auth->redirect());
                // $this->redirect(array(
                //    'controller' => 'streams',
                //    'action'     => 'index'
                // ));
            }
        }
        //$this->redirect(['action' => 'logout']);
    }

    protected function _authFacebook() {
        $loginUrl = $this->Facebook->getLoginUrl(['redirect_uri' => Router::fullBaseUrl() . Router::url(['controller' => 'users', 'action' => 'login'])]);
        return $this->redirect($loginUrl);
    }

    public function logout() {
        $this->Facebook->destroySession();
        $this->redirect($this->Auth->logout());
    }

    protected function _add() {
        $this->autoRender = false;

        $facebookInfo = $this->Facebook->api('/me', 'GET');
        $user = array(
                'User' => array(
                    'name' => $facebookInfo['name'],
                    'id_facebook' => $facebookInfo['id']
                    /** createdとmodifiedというカラムがある場合、
                      .*. 下記のように記述しなくても、作成時と更新時に自動で現在時刻が挿入される。
                      .*. よって'created'、'modified'は削除してもOK
                      .*/
                    //'created' => date('Y-m-d H:i:s'),
                    //'modified' => date('Y-m-d H:i:s'),
                    //'link' => $facebookInfo['link'],
                    )
                );
        $this->User->create();
        if ($this->User->save($user)) {
            $this->Session->setFlash(__('登録が完了しました。'));
        } else {
            $this->Session->setFlash(__('登録てきません.'));
        }

        $this->redirect(array(
            'controller' => 'Users',
            'action'     => 'login'
        ));
    }

    public function test(){}
}
