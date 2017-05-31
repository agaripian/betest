<?php


namespace Behance\Action\User;

use Behance\Action;
use Behance\Model\Image;
use Behance\Utils\DatabaseUtils;
use Slim\Http\Request;
use Slim\Http\Response;

class GetAllImages extends Action\AbstractImpl
{
    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function run(Request $request, Response $response, array $args) : Response
    {
        $user_id = intval($args['id']);

        /** @noinspection PhpUndefinedMethodInspection */
        $builder = Image::query()->where('userid', '=', $user_id);

        return $response->withJson($builder->get());
    }
}
