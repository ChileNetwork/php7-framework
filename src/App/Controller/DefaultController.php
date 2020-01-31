<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController {

    /** @var Request */
    protected $request;

    function __construct(Request $request)
    {
        //dump($request);die;
        $this->request = $request;
    }

    function defaultAction()
    {
        $name = ucfirst($this->request->get('name'));
        $resp = new Response("Welcome $name");
        //dump($resp);die;
        return $resp;
    }
}