<?php
namespace SnorkelWeb\QueryBuilder\Traits;

trait Params
{

    protected $params;
    protected $paramkey = [];
    protected $paramvalue = [];
    public function withparams($keys,$values)
    {
        $this->paramkey[] = $keys;
        $this->paramvalue[] = $values;
        return $this;
    }

    public function parambinder()
    {
        $this->param = array_combine($this->paramkey,$this->paramvalue);
        // print_r($this->param);
        if(!empty($this->param))
        {
              // Prepare code
        foreach($this->param as $key => $value)
        {
    //    Execute the loop and bind the parameters
        $this->stmt->bindValue($key,$value);
        }
        }
      
    }
}