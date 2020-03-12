<?php

namespace subscription;

class Subscription {
    /**
     * Хранит в себе либо \elements\Document 
     * или \elements\Resource
     * 
     * @var \element\Element 
     */
    private $element;
    
    /**
     *
     * @var \user\User
     */
    private $user;
    
    /**
     * Ключи номер обновления
     * Значения логический прочитана или нет
     * @var array 
     */
    private $readInfo = [];
    
    /**
     * 
     * @param \user\User $user
     * @param \elements\Element $element
     */
    public function __construct($user, $element) {
        $this->user = $user;
        $this->element = $element;
    } 
    
    /**
     * 
     * @return \elements\Element 
     */
    public function getElement() {
        return $this->element;
    }
    
    /**
     * 
     * @return \user\User
     */
    public function getUser() {
        return $this->user;
    }
    
    public function getReadInfo() {
        return $this->readInfo;
    }

}

