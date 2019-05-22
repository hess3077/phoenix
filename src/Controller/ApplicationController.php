<?php

namespace App\Controller;

use App\Entity\Application;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;



class ApplicationController extends FOSRestController
{
    /**
     * List of the applications
     *
     * @Route("/api/applications", methods={"GET"})
     * @Rest\View()
     * @SWG\Response(
     *     response=200,
     *     description="Returns the list of applications",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Application::class, groups={"full"}))
     *     )
     * )
     * @SWG\Tag(name="Applications")
     * @Security(name="Bearer")
     * 
     * @return View
     */
    public function cgetAction()
    {
        $application = $this->get('doctrine')->getRepository(Application::class)->findAll();

        return $application;
    }
}
