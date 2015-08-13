<?php // src/Controllers/UsersController.php
namespace App\Controller;

use Component\SecurityComponent;
use Cake\Event\Event;

class UsersController extends AppController {
    public function initialize() {
        parent::initialize();
        $this->loadComponent('Flash');
    }
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        //Allow users to register and logout.
        $this->Auth->allow(['register','logout']);
        $this->set('role', $this->Auth->user('role'));
    }
    public function index() {
        $users = $this->Users->find('all');
        $this->set(compact('users'));
    }
    public function view($id = null) {
        if($id == null) {
            $this->Flash->error(__('Error in request. Invalid URL'));
            return $this->redirect(['action' => 'index']);
        }
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }
    public function add() {
        $user = $this->Users->newEntity();
        if($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if($this->Users->save($user)) {
                $this->Flash->success(__('Your user has been saved'));
                return $this->redirect(['action' => 'view/'.$user->id]);
            }
            $this->Flash->error(__('Unable to save user'));
        }
        $this->set('user',$user);
    }
    public function edit($id = null) {
        $user = $this->Users->get($id);
        if($this->request->is('put')) {
            $this->Flash->success(__('Data should have been posted?'));
            $user = $this->Users->patchEntity($user, $this->request->data);
            if($this->Users->save($user)) {
                $this->Flash->success(__('Your user has been saved'));
                return $this->redirect(['action' => 'view/'.$user->id]);
            }
            $this->Flash->error(__('Unable to save user'));
        }
        $this->set('user',$user);
    }
    public function delete($id = null) {
        if($id == null) {
            $this->Flash->error(__('Error in request. Invalid URL'));
            return $this->redirect(['action' => 'index']);
        }
        $user = $this->Users->get($id);
        $user->deleted = 1;
        if($this->Users->save($user)){
            $this->Flash->success(__('User '.$id.' ('.$user->username.') was successfully deleted'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Error updating record'));
        return $this->redirect(['action' => 'index']);
    }
    public function restore($id = null) {
        if($id == null) {
            $this->Flash->error(__('Error in request. Invalid URL'));
            return $this->redirect(['action' => 'index']);
        }
        $user = $this->Users->get($id);
        $user->deleted = 0;
        if($this->Users->save($user)){
            $this->Flash->success(__('User '.$id.' ('.$user->username.') was successfully restored'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Error updating record'));
        return $this->redirect(['action' => 'index']);
    }
    public function register(){
        $user = $this->Users->newEntity();
        if($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            //defaults for registering user
            $user->role = "user";
            if($this->Users->save($user)) {
                $this->Flash->success(__('You have successfully registered!'));
                $this->Auth->setUser($user->toArray());
                return $this->redirect([
                                        'controller' => 'home',
                                        'action' => 'index']);
            }
            $this->Flash->error(__('Unable to save user'));
        }
        $this->set('user',$user);
    }
    public function login() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password'));
        }
        $this->set(compact('user'));
    }
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
    public function bulk() {
        
    }
    public function bulk_update() {
        $user = $this->Users->get();
        $this->set('user',$user);
    }
}
