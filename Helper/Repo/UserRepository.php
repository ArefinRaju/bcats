<?php


namespace Helper\Repo;


use App\Models\User;

class UserRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(User::class);
    }

    public function firstOrNewByEmail(string $email)
    {
        return User::query()->firstOrNew(
            [
                'email' => $email
            ]
        );
    }

    public function findByEmail(string $email)
    {
        return User::where(
            [
                'email' => $email
            ]
        )->First();
    }
}