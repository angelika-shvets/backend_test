<?php

/**
 * Created by PhpStorm.
 * User: angelika
 * Date: 7/26/17
 * Time: 8:25 PM
 */
namespace  App\Models;

use App\Shoppers;

class ShopperModel 
{
    /**
     * @var string
     */
    private  $_email;
    /**
     * @var string
     */
    private $_name;
    /**
     * @var string
     */
    private $_lastName;
    /**
     * @var string
     */
    private $_phone;
    /**
     * @var string
     */
    private $_city;
    /**
     * @var string
     */
    private $_street;
    /**
     * @var string
     */
    private $_houseNumber;
    /**
     * @var integer
     */
    private $_id;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->_lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->_lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->_street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->_street = $street;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->_city = $city;
    }

    /**
     * @return string
     */
    public function getHouseNumber()
    {
        return $this->_houseNumber;
    }

    /**
     * @param string $houseNumber
     */
    public function setHouseNumber($houseNumber)
    {
        $this->_houseNumber = $houseNumber;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }


    /**
     * @param array $shopper_parameters
     * @return ShopperModel $this
     */
    public  function loadFromArray($shopper_parameters){
        
        if($shopper_parameters && is_array($shopper_parameters) && count($shopper_parameters)>0){
            foreach ($shopper_parameters as $parameter_name => $parameter_value){
                switch ($parameter_name){
                    case ShopperInterface::EMAIL:
                        $this->setEmail($parameter_value);
                        break;
                    case ShopperInterface::NAME:
                        $this->setName($parameter_value);
                        break;
                    case ShopperInterface::LAST_NAME:
                        $this->setLastName($parameter_value);
                        break;
                    case ShopperInterface::PHONE:
                        $this->setPhone($parameter_value);
                        break;
                    case ShopperInterface::CITY:
                        $this->setCity($parameter_value);
                        break;
                    case ShopperInterface::HOUSE_NUMBER:
                        $this->setHouseNumber($parameter_value);
                        break;
                    case ShopperInterface::SHOPPER_ID:
                        $this->setId($parameter_value);
                        break;
                }
            }
        }
        return $this;
    }

    /**
     * @param Shoppers $shopper_model
     * @return Shoppers $shopper_model
     */
    public  function loadPDOModelFromModel($shopper_model){

        $shopper_model->email = $this->getEmail();
        $shopper_model->phone = $this->getPhone();
        $shopper_model->name = $this->getName();
        $shopper_model->last_name = $this->getLastName();
        $shopper_model->city = $this->getCity();
        $shopper_model->house_number = $this->getHouseNumber();
        
        return $shopper_model;
    }
    /**
     * @param Shoppers $shopper_model
     * @return ShopperModel $this
     */
    public  function loadModelFromPDOModel($shopper_model){

        $this->setEmail($shopper_model->email );
        $this->setPhone($shopper_model->phone );
        $this->setName($shopper_model->name);
        $this->setLastName($shopper_model->last_name);
        $this->setCity($shopper_model->city);
        $this->setHouseNumber($shopper_model->house_number);

        return $this;
    }
    /**
     * @param array $shopper_parameters
     * @return array $shopper_result
     */
    public  function loadArrayFromModel($shopper_parameters){
        $shopper_result= [];
        if($shopper_parameters && is_array($shopper_parameters) && count($shopper_parameters)>0){
            foreach ($shopper_parameters as $parameter_name ){
                switch ($parameter_name){
                    case ShopperInterface::EMAIL:
                        $shopper_result[ShopperInterface::EMAIL] = $this->getEmail();
                        break;
                    case ShopperInterface::NAME:
                        $shopper_result[ShopperInterface::NAME] = $this->getName();
                        break;
                    case ShopperInterface::LAST_NAME:
                        $shopper_result[ShopperInterface::LAST_NAME] = $this->getLastName();
                        break;
                    case ShopperInterface::PHONE:
                        $shopper_result[ShopperInterface::PHONE] =  $this->getPhone();
                        break;
                    case ShopperInterface::CITY:
                        $shopper_result[ShopperInterface::CITY] =  $this->getCity();
                        break;
                    case ShopperInterface::HOUSE_NUMBER:
                        $shopper_result[ShopperInterface::HOUSE_NUMBER] = $this->getHouseNumber();
                        break;
                    case ShopperInterface::SHOPPER_ID:
                        $shopper_result[ShopperInterface::SHOPPER_ID] = $this->getId();
                        break;
                }
            }
        }
        return $shopper_result;
    }

}