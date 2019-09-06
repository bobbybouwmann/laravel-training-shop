<?php

namespace App\Policies;

use App\Category;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param $ability
     * @return mixed
     */
    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the category.
     *
     * @param \App\User $user
     * @param \App\Category $category
     * @return bool
     */
    public function view(User $user, Category $category): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param \App\User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param \App\User $user
     * @param \App\Category $category
     * @return bool
     */
    public function update(User $user, Category $category): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param \App\User $user
     * @param \App\Category $category
     * @return bool
     */
    public function delete(User $user, Category $category): bool
    {
        return false;
    }
}
