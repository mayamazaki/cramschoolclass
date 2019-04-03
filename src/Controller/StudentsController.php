<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Http\Exception\NotFoundException;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 *
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CramSchoolClasses', 'Users' => ['CramSchools']],
            'conditions' => [
                'Students.cram_school_class_id' => $this->Auth->user('id'),
                'Users.is_valid' => 1, // 1.有効
            ],
            'order' => [
                'Users.disp_no' => 'asc' // 表示順
            ]
        ];
        $students = $this->paginate($this->Students);
        $this->set(compact('students'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $student = $this->Students->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['cram_school_id'] = $this->Auth->user('cram_school_id');
            $data['host'] = $_SERVER['REMOTE_ADDR']; // IP
            $data['students'][0]['cram_school_class_id'] = $this->Auth->user('id');
            $student = $this->Students->Users->patchEntity($student, $data, ['associated' => ['Students']]);
            if ($this->Students->Users->save($student)) {
                $this->Flash->success(__('生徒を登録しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('入力項目にエラーがあります。'));
        }
        // 塾
        $cramSchoolsTable = $this->getTableLocator()->get('CramSchools');
        $cramSchools = $cramSchoolsTable->find('list', ['limit' => 200]);
        // クラス
        $cramSchoolClasses = $this->Students->CramSchoolClasses->find('list', ['limit' => 200]);

        $this->set(compact('student', 'cramSchools', 'cramSchoolClasses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $student = $this->Students->Users->get($id, [
            'contain' => ['Students']
        ]);
        if ($this->Auth->user('id') != $student->students[0]->cram_school_class_id) {
            throw new NotFoundException();
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['host'] = $_SERVER['REMOTE_ADDR']; // IP
            if (empty($data['password'])) {
                // パスワード未変更
                // パスワードのバリデーションを解除
                unset($data['password']);
                $this->Students->Users->getValidator('default')->offsetUnset('password');
            }
            $student = $this->Students->Users->patchEntity($student, $data, ['associated' => ['Students']]);
            if ($this->Students->Users->save($student)) {
                $this->Flash->success(__('生徒を更新しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('入力項目にエラーがあります。'));
        }
        // 塾
        $cramSchoolsTable = $this->getTableLocator()->get('CramSchools');
        $cramSchools = $cramSchoolsTable->find('list', ['limit' => 200]);
        // クラス
        $cramSchoolClasses = $this->Students->CramSchoolClasses->find('list', ['limit' => 200]);

        $this->set(compact('student', 'cramSchools', 'cramSchoolClasses'));
    }

    /**
     * Invalid method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function invalid($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $student = $this->Students->Users->get($id, [
            'contain' => ['Students']
        ]);
        if ($this->Auth->user('id') != $student->students[0]->cram_school_class_id) {
            throw new NotFoundException();
        }
        $data = [];
        $data['id'] = $id;
        $data['is_valid'] = 0; // 0.無効
        $student = $this->Students->Users->patchEntity($student, $data);
        if ($this->Students->Users->save($student)) {
            $this->Flash->success(__('生徒を削除しました。'));
        } else {
            $this->Flash->error(__('生徒の削除に失敗しました。'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * reset password method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function resetPassword($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $student = $this->Students->Users->get($id, [
            'contain' => ['Students']
        ]);
        if ($this->Auth->user('id') != $student->students[0]->cram_school_class_id) {
            throw new NotFoundException();
        }
        $data = [];
        $data['id'] = $id;
        $data['password'] = '00000000'; // 00000000
        $student = $this->Students->Users->patchEntity($student, $data);
        if ($this->Students->Users->save($student)) {
            $this->Flash->success(__('生徒のパスワードをリセットしました。'));
        } else {
            $this->Flash->error(__('生徒のパスワードのリセットに失敗しました。'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
