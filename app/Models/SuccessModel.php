<?php

/**
 * Created by PhpStorm.
 * User: angelika
 * Date: 7/26/17
 * Time: 10:55 PM
 */
namespace  App\Models;

use App\Shoppers;

class SuccessModel 
{
    /**
     * @var array
     */
    private  $_create_new_shopper =[ShopperInterface::SHOPPER_ID];
    /**
     * @var array
     */
    private  $_update_shopper =[ShopperInterface::SHOPPER_ID];
    /**
     * @var array
     */
    private  $_get_shopper =[ShopperInterface::SHOPPER_ID,ShopperInterface::EMAIL,ShopperInterface::NAME,ShopperInterface::LAST_NAME,
                        ShopperInterface::PHONE,ShopperInterface::CITY,ShopperInterface::HOUSE_NUMBER];
    /**
     * @return array
     */
    public function getCreateNewShopper()
    {
        return $this->_create_new_shopper;
    }

    /**
     * @return array
     */
    public function getUpdateShopper()
    {
        return $this->_update_shopper;
    }

    /**
     * @return array
     */
    public function getGetShopper()
    {
        return $this->_get_shopper;
    }


  

}