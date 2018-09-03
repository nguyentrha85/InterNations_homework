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
use App\Repository\UsersRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\Users;
use App\Form\UsersType;

class UsersController extends Controller
{

    /**
     * API for getting all users
     * @FOSRest\Get("/api/users")
     *
     * @return array
     */
    public function index(UsersRepository $usersRepository)
    {
        return View::create($usersRepository->findAll(), Response::HTTP_OK , []);
    }

    /**
     * API for creating a new user
     * @FOSRest\Post("/api/users")
     *
     * @return array
     */
    public function create(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new Users();
        $encoded = $encoder->encodePassword($user, $request->get('password'));
        $user->setPassword($encoded);
        $user->setName($request->get('name'));
        $user->setUsername($request->get('username'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return View::create($user, Response::HTTP_CREATED , []);
    }

    /**
     * API for deleting a new user
     * @FOSRest\Delete("/api/users/{id}")
     *
     * @return array
     */
    public function delete(Request $request, UsersRepository $usersRepository)
    {
        $user = $usersRepository->find($request->get('id'));
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        return View::create($user, Response::HTTP_OK , []);
    }
}
