<?php

/**
 * Created by PhpStorm.
 * User: angelika
 * Date: 7/26/17
 * Time: 10:25 PM
 */
namespace  App\Models;

use App\Shoppers;

class ErrorsModel 
{
    /**
     * @var string
     */
    private  $_email_exist ='Email Already Exist';
    /**
     * @var string
     */
    private  $_system_problem = 'System problem';
    /**
     * @var string
     */
    private  $_shopper_not_exist = 'Shopper Not Exist';
    /**
     * @return string
     */
    public function getEmailExist()
    {
        return $this->_email_exist;
    }

    /**
     * @return string
     */
    public function getSystemProblem()
    {
        return $this->_system_problem;
    }

    /**
     * @return string
     */
    public function getShopperNotExist()
    {
        return $this->_shopper_not_exist;
    }
   
  

}