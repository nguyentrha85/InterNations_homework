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
}
