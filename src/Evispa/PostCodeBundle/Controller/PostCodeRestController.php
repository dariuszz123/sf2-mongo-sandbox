<?php

namespace Evispa\PostCodeBundle\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class PostCodeRestController extends FOSRestController
{

    public function getCodesAction()
    {
//         $postCodeRepo = $this->get('doctrine')->getRepository('EvispaPostCodeBundle:PostCode');
//         $oldPostCodes = $postCodeRepo->getLimited(500);

        /** @var ObjectManager $dm */
        $dm = $this->get('doctrine_mongodb')->getManager();

        /** @var $oldPostCode \Evispa\PostCodeBundle\Entity\PostCode */
//        foreach($oldPostCodes as $oldPostCode) {
//            $postCode = new PostCode();
//            $postCode->setCity($oldPostCode->getCity());
//            $postCode->setCode($oldPostCode->getCode());
//            $postCode->setMunicipality($oldPostCode->getMunicipality());
//            $postCode->setNumber($oldPostCode->getNumber());
//            $postCode->setStreet($oldPostCode->getStreet());
//            $dm->persist($postCode);
//        }
//
//        $postCode = new PostCode();
//        $postCode->setCity('Vilnius');
//        $postCode->setCode('LT-test');
//        $postCode->setMunicipality('Test');
//        $postCode->setNumber('5A');
//        $postCode->setStreet('gatve');
//
//
//        $dm->persist($postCode);
//        $dm->flush();

        $postCodes = $dm->getRepository('EvispaPostCodeBundle:PostCode')->findAll();

        $codes = array();

        foreach ($postCodes as $code) {
            $codes[] = $code;
        }

        $view = View::create();

        if ($postCodes) {
            $view->setStatusCode(200)->setData($codes);
        }
        return $this->handleView($view);
    }
}
