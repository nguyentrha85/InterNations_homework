<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GroupsController extends AbstractController
{
    /**
     * @Route("/api/groups", name="api_groups")
     */
    public function index()
    {
        return $this->render('api/groups/index.html.twig', [
            'controller_name' => 'GroupsController',
        ]);
    }
}
