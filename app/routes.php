<?php

declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Models\ReviewComment;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->get('/review', function (Request $request, Response $response) {
        $comment = ReviewComment::all();
        // データない場合はメッセージを返す
        if ($comment->count() > 0) {
            $jsonComment = json_encode($comment);
            $response->getBody()->write($jsonComment);
        } else {
            $response->getBody()->write("まだ指摘はありません。");
            $response = $response->withStatus(404);
        }
        return $response;
    });
};
