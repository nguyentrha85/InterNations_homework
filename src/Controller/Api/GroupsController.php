<?php

namespace App\Controller\Api;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use App\Entity\Groups;
use App\Form\GroupsType;
use App\Repository\GroupsRepository;

class GroupsController extends Controller
{
    /**
     * API for getting all users
     * @FOSRest\Get("/api/groups")
     *
     * @return array
     */
    public function index(GroupsRepository $groupsRepository)
    {
        return View::create($groupsRepository->findAll(), Response::HTTP_OK , []);
    }

    /**
     * API for creating a new group
     * @FOSRest\Post("/api/groups")
     *
     * @return array
     */
    public function create(Request $request)
    {
        $group = new Groups();
        $group->setName($request->get('name'));
        $group->setDescription($request->get('description'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($group);
        $em->flush();

        return View::create($group, Response::HTTP_CREATED , []);
    }

    /**
     * API for deleting a group
     * @FOSRest\Delete("/api/groups/{id}")
     *
     * @return array
     */
    public function delete(Request $request, GroupsRepository $groupsRepository)
    {
        $group = $groupsRepository->find($request->get('id'));
        $em = $this->getDoctrine()->getManager();
        $em->remove($group);
        $em->flush();

        return View::create($group, Response::HTTP_OK , []);
    }
}
