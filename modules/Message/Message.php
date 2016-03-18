<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Message
 *
 * @author Администратор
 */
class MessageModule implements ModuleInterface {
    
    private $relations = Array(
                                'AuthorisationModule' => '',
                                );
    
    private $message;
    
    private $template;
    
    private $sessionAdapter;
    
    
    /*
     *      $sessionAdapter должен быть класса Auth
     * 
     */
    function __construct() {
        
        $this->message = '';
        $this->template = new Smarty;
        $this->template->debugging = false;
        $this->template->caching = false;
                
    }
    
    /*
     *      Найти сообщение в сессионных данных    
     */
    private function setMessage(){
        
        $this->message = ($this->message == '')? $this->relations['AuthorisationModule']->getAuthData('message'):$this->message;
        
    }
    
    /*
     *      Инифиализировать данные от пользователя      
     */
    
    public function message($message){
        
        $this->message = $message;
        $this->saveMessage();
        
    }
    
    private function resetMessage(){
        
        $this->message = '';
        $this->relations['AuthorisationModule']->setAuthData('message','');
        
    }
    
    private function saveMessage() {
        
        ($this->message != '')? $this->relations['AuthorisationModule']->setAuthData('message',$this->message):false;
        
    }
    
    function getHtmlData() {
        
        if (empty($this->message))
            $this->setMessage();
        
        if (empty($this->message))
            return false;
        
        ob_start();
        
        $this->template->assign('MessageModule',$this->message);
        
        $this->template->display('message.tpl');
        
        $htmldata = ob_get_contents();
        
        ob_end_clean();
        
        $this->resetMessage();
        
        return $htmldata;
    }
    
    public function getRelationModules() {
        return $this->relations;
    }
    
    public function setRelationModules($modules = Array()) {
    
        if (empty($this->relations) || (empty($modules))) return;
        
        foreach ($this->relations as $key => $value)
            $this->relations[$key] = $modules[$key];
            
    }
}
