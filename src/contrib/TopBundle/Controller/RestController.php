<?php

namespace contrib\TopBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use TopBundle\Entity\Skill;

class RestController extends FOSRestController
{    
    /**
     * @Rest\Get("/skills")
     */
    public function getSkillsAction()
    {
      $restresult = $this->getDoctrine()->getRepository('TopBundle:Skill')->findAll();
        if ($restresult === null) {
          return new View("there are no users exist", Response::HTTP_NOT_FOUND);
     }
        return $restresult;
    }
    
    /**
     * @Rest\Get("/skills")
     */
    public function getSkillAction($id)
    {
        $restresult = $this->getDoctrine()->getRepository('TopBundle:Skill')->find($id);
        if ($restresult === null) {
          return new View("there are no users exist", Response::HTTP_NOT_FOUND);
     }
        return $restresult;
    }
    
    /**
     * @Rest\Get("/skills")
     */
    public function getSkilledUserAction($id)
    {
        $skill = $this->getDoctrine()->getRepository('TopBundle:Skill')->find($id);
        $users = $this->getDoctrine()->getRepository('TopBundle:User')->findAll();
        $results = [];
        foreach($users as $user){
            $userSkill = $user->getSkill();
            $skillID = $userSkill[0];
            if($skillID->getId() == $skill->getId()){
                array_push($results, $user);
            }
            
        }
        
        
        return $results;
    }
    
    /**
     * @Rest\Get("/users")
     */
    public function getUserAction($id)
    {
      $restresult = $this->getDoctrine()->getRepository('TopBundle:User')->find($id);
        if ($restresult === null) {
          return new View("there are no users exist", Response::HTTP_NOT_FOUND);
     }
        return $restresult;
    }
    
    
        /**
     * @Rest\Get("/users")
     */
    public function getUsersAction()
    {
      $restresult = $this->getDoctrine()->getRepository('TopBundle:User')->findAll();
        if ($restresult === null) {
          return new View("there are no users exist", Response::HTTP_NOT_FOUND);
     }
        return $restresult;
    }
    
    /**
     * @Rest\Get("/teams")
     */
    public function getTeamsAction()
    {
      $restresult = $this->getDoctrine()->getRepository('TopBundle:Team')->findAll();
        if ($restresult === null) {
          return new View("there are no users exist", Response::HTTP_NOT_FOUND);
     }
        return $restresult;
    }
}
