<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository
{
    /**
     * @param int $id
     * @return User|null|object
     */
    public function find(int $id): ?User
    {
        return User::query()->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return User::all();
    }

    /**
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        $newUser = new User();

        return $this->update($newUser, $data);
    }

    /**
     * @param User $user
     * @param array $data
     * @return User
     */
    public function update(User $user, array $data): User
    {
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->patronymic = $data['patronymic'];
        $user->email = $data['email'];
        $user->password = $data['password'];

        $user->save();
        return $user;
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        User::query()
            ->where('id', '=', $id)
            ->delete()
        ;
    }
}
