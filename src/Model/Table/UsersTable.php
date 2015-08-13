<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\ORM\Rule\IsUnique;

class UsersTable extends Table {
    public function initialize(array $config){
        $this->addBehavior('Timestamp');
    }
    public function validatorDefault(Validator $validator){
        $validator
            ->requirePresence('username')
            ->notEmpty('username','A username is required');
        $validator
            ->requirePresence('password')
            ->notEmpty('password','A password is required');
        $validator
            ->requirePresence('email')
            ->notEmpty('email','An email is required');
        $validator
            ->requirePresence('role')
            ->notEmpty('role','A role is required');
        return $validator;
    }
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
