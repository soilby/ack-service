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

    public function place($category, $param) {
        $doc = new AckDoc();
        $doc->setCategory($category);
        $doc->setAckParam($param);

        $this->odm->persist($doc);
        $this->odm->flush();

    }

    public function test($category, $param)  {

        $doc = $this->getRepository()->findOneBy([
            'category' => $category,
            'param' => $param
        ]);


        return $doc;
    }


    public function free($category, $param)
    {

        $doc = $this->getRepository()->findOneBy([
            'category' => $category,
            'param' => $param
        ]);

        if ($doc) {
            $this->odm->remove($doc);
            $this->odm->flush();

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