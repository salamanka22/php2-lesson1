<?php


namespace App;


/**
 * Class View
 * @package App
 */
class View
    implements \Countable
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
        
        foreach ($this->data as $property => $value){
            $$property = $value;
        }
        
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
    
    /**
     * Count elements of an object
     * @link https://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->data);
    }
}