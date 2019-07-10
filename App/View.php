<?php


namespace App;

/**
 * Class View
 * @package App
 */
class View
{
    /**
     * @var array
     */
    protected $data = [];
    
    /**
     * @param $k
     * @param $v
     */
    public function __set($k, $v){
       $this->data[$k] = $v;
       //var_dump($this->data);
    }
    
    /**
     * @param $k
     * @return mixed
     */
    public function __get($k){
        return $this->data[$k];
    }
    
    /**
     * @param $template
     */
    public function render($template){
        ob_start();
        require_once $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
    
    /**
     * @param $template
     */
    public function display($template){
        echo $this->render($template);
    }
}