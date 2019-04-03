<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * beforeFilter method
     *
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login','logout']);
    }

    /**
     * Login method
     *
     */
    public function login()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
            	$this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('ログインIDまたはパスワードが正しくありません。'));
        }
    }

    /**
     * Logout method
     *
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
