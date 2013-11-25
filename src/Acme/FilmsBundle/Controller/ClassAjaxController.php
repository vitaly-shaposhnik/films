<?php
namespace Acme\FilmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ClassAjaxController extends Controller
{
    /**
     * @Route("/ajax", name="ajax")
     */
    public function ajaxAction(Request $request)
    {
        $value = $request->get('term');

        // .... (Search values)
        $search = array('Bar', 'Foo');

        $response = new Response();
        $response->setContent(json_encode($search));

        return $response;
    }
}