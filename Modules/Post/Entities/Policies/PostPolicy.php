<?php

namespace Modules\Post\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\User;

class PostPolicy
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

    public function update(\App\Models\User $user, Post $post){
        return $user->id === $post->user_id;
    }

}
