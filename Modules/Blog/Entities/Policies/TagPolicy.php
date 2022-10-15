<?php

namespace Modules\Blog\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Blog\Entities\Tag;
use Modules\Blog\Entities\User;

class TagPolicy
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

    public function update(\App\Models\User $user, Tag $tag){
        return $user->hasRole('admin');
    }

}
