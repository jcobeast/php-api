<?php 

namespace PHP_API\PhpApi;

class User
{
    public int $userId;

    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $phoneNumber)
    {      
    }
        
    // create user
    public function create(): self
    {
        return $this;
    }

    // retrieve all user
    public function retrieveAll(): array
    {
        return [];
    }

    // retrieve user
    public function retrieve(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    // update user
    public function update(): self
    {
        return $this;
    }

    // delete user
    public function remove(): bool
    {
        return true;
    }
}


?>