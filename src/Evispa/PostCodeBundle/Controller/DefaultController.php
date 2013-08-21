<?php

namespace Evispa\PostCodeBundle\Controller;

use Evispa\PostCodeBundle\Document\PostCode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
//         $postCodeRepo = $this->get('doctrine')->getRepository('EvispaPostCodeBundle:PostCode');
//         $oldPostCodes = $postCodeRepo->getLimited(500);

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

        return array('codes' => $postCodes);
    }
}
