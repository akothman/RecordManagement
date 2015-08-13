<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class HomeController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->loadComponent('Flash');
    }
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->set('role', $this->Auth->user('role'));
    }
    public function index(){
        
    }
}

