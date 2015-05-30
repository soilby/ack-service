<?php
/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 29.5.15
 * Time: 15.12
 */

namespace Soil\AckService\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Class AckDoc
 * @package Soil\AckService\Entity
 * @ODM\Document(collection="ack")
 */
class AckDoc {

    /**
     * @var string
     * @ODM\Id
     */
    protected $id;

    /**
     * @var \DateTime
     * @ODM\Date
     */
    protected $date;

    /**
     * @var string
     * @ODM\String
     */
    protected $category;

    /**
     * @var string
     * @ODM\String
     */
    protected $ackParam;

    /**
     * @return string
     */
    public function getAckParam()
    {
        return $this->ackParam;
    }

    /**
     * @param string $ackId
     */
    public function setAckParam($ackId)
    {
        $this->ackParam = $ackId;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }



} 