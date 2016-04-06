<?php
/**
 * Created by IntelliJ IDEA.
 * User: czoeller
 * Date: 06.04.16
 * Time: 16:11
 */

namespace HsBremen\WebApi\Order;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class OrderService
{

    /**
     * GET /order
     *
     * @return JsonResponse
     */
    public function getList()
    {
        $orders = array(new Order("Order 1"), new Order("Order 2"));
        return new JsonResponse($orders);
    }


    /**
     * GET /order/{id}
     *
     * @param $id
     * @return JsonResponse
     */
    public function get($id)
    {
        return new JsonResponse(new Order("Order {$id}"));
    }

    /**
     * POST /order
     *
     * @return JsonResponse
     */
    public function post()
    {
        return new JsonResponse(new Order(), Response::HTTP_CREATED);
    }
    /**
     * PUT /order/{id}
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function put(Request $request)
    {
        $order = new Order("Order 42");
        $newTitle = $request->request->get('title', "Default Title");
        $order->setTitle($newTitle);
        return new JsonResponse($order);
    }

    /**
     *
     * DELETE /order/{id}
     *
     * @param $id
     * @return JsonResponse
     */
    public function delete($id)
    {
        // No meaningful treatment possible in this example
        return new Response( null, Response::HTTP_NO_CONTENT);
    }

}