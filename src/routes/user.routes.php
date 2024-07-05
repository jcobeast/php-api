<?php
namespace PHP_API\PhpApi;

require_once dirname(path: __DIR__) . '/endpoints/User.php';

enum UserAction: string
{
    case CREATE = 'create';

    case RETRIEVE_ALL = 'retrieveAll';

    case RETRIEVE = 'retrieve';

    case REMOVE = 'remove';

    case UPDATE = 'update';

    public function getResponse(): string
    {
        
        $userId = !empty($_GET['user_id']) ? (int)$_GET['user_id'] : 0;
        
        $user = new User(name: 'Jacob', email: 'ranneljcobeast@gmail.com', phoneNumber: '09166533361');

        $response = match ($this) {
            self::CREATE => $user->create(),
            self::RETRIEVE_ALL => $user->retrieveAll(),
            self::RETRIEVE => $user->retrieve($userId),
            self::REMOVE => $user->remove(),
            self::UPDATE => $user->update(),
        };

        return json_encode($response, JSON_PRETTY_PRINT);
    }
}

$action = $_GET['action'] ?? null;

$userAction = match ($action) {
    'create' => UserAction::CREATE, // send 201
    'retrieve' => UserAction::RETRIEVE, // send 200 ok
    'remove' => UserAction::REMOVE, // send 204
    'update' => UserAction::UPDATE,
    default => UserAction::RETRIEVE_ALL, // send 200 ok
};

echo $userAction->getResponse();

?>