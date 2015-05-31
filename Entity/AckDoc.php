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
    protected $creationDate;

    /**
     * @var \DateTime
     * @ODM\Date
     */
    protected $lastDate;

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
     * @var int
     * @ODM\Int
     */
    protected $times;

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
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param \DateTime $date
     */
    public function setCreationDate($date)
    {
        $this->creationDate = $date;
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

    /**
     * @return int
     */
    public function getTimes()
    {
        return $this->times;
    }

    /**
     * @param int $times
     */
    public function setTimes($times)
    {
        $this->times = $times;
    }

    public function increaseTimes($number = 1) {
        $this->times += $number;
        if ($this->times < 0) $this->times = 0;
    }

    /**
     * @return \DateTime
     */
    public function getLastDate()
    {
        return $this->lastDate;
    }

    /**
     * @param \DateTime $lastDate
     */
    public function setLastDate($lastDate)
    {
        $this->lastDate = $lastDate;
    }



    public function __construct()   {
        $this->creationDate = new \DateTime();
    }

} 