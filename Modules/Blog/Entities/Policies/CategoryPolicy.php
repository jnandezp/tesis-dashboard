<?php

namespace Modules\Blog\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\User;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(\App\Models\User $user, Category $category){
        return $user->hasRole('admin');
    }

}
