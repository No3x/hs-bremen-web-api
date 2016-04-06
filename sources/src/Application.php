<?php

namespace HsBremen\WebApi;

use HsBremen\WebApi\Order\OrderService;
use Silex\Application as Silex;
use Silex\Provider\ServiceControllerServiceProvider;
use Symfony\Component\HttpFoundation\Request;

class Application extends Silex
{
    public function __construct(array $values = [])
    {
        parent::__construct($values);
        $this->setup($this);

        $this['service.order'] = $this->share(function () {
            return new OrderService();
        });

        $this->get('/order', 'service.order:getList');
        $this->get('/order/{id}', 'service.order:get');
        $this->post('/order', 'service.order:post');
        $this->put('/order/{id}', 'service.order:put');
        $this->delete('/order/{id}', 'service.order:delete');

        $this->get('/', function () {
            return 'Hello World';
        });

        $this->get('/calculator/add/{a}/{b}', function ($a, $b) {
            $calc = new Calculator();
            $result = $calc->add($a, $b);
            return "result = {$result}";
        });

    }

    private function setup(Silex $app)
    {
        $this->register(new ServiceControllerServiceProvider());

        // Set debug mode
        $this["debug"] = true;

        // http://silex.sensiolabs.org/doc/cookbook/json_request_body.html
        $this->before(function (Request $request) use ($app) {
            if (Util::requestIsJson($request)) {
                $data = json_decode($request->getContent(), true);
                $request->request->replace(is_array($data) ? $data : []);
            }
        });
    }
}
