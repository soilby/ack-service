<?php
/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 29.5.15
 * Time: 15.08
 */

namespace Soil\AckService\Service;

use Doctrine\ODM\MongoDB\DocumentRepository;
use Soil\AckService\Entity\AckDoc;
use Talaka\Repository\CommentRepository;

class Ack {

    protected $odm;

    public function __construct($odm)   {
        $this->odm = $odm;
    }


    public function decrease($category, $param) {
        $doc = $this->test($category, $param);
        if ($doc)   {
            $doc->increaseTimes(-1);
            $doc->setLastDate(new \DateTime());

            $this->odm->flush($doc);

            return $doc;
        }

        return null;
    }

    public function place($category, $param, $flush = true) {
        $doc = $this->test($category, $param);
        if ($doc)   {
            $doc->increaseTimes();
        }
        else {
            $doc = new AckDoc();
            $doc->setCategory($category);
            $doc->setAckParam($param);

            $this->odm->persist($doc);
        }
        $doc->setLastDate(new \DateTime());

        if ($flush) {
            $this->odm->flush($doc);
        }
    }

    public function flush() {
        $this->odm->flush();
    }

    /**
     * @param $category
     * @param $param
     *
     * @return AckDoc
     */
    public function test($category, $param)  {

        $doc = $this->getRepository()->findOneBy([
            'category' => $category,
            'ackParam' => $param
        ]);


        return $doc;
    }



    public function forget($category, $param)
    {

        $doc = $this->getRepository()->findOneBy([
            'category' => $category,
            'ackParam' => $param
        ]);

        if ($doc) {
            $this->odm->remove($doc);
            $this->odm->flush($doc);

            return true;
        }

        return false;
    }

    /**
     * @return DocumentRepository
     */
    protected function getRepository()  {
        return $this->odm->getRepository('Soil\AckService\Entity\AckDoc');
    }
} 