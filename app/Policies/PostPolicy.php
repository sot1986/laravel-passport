<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

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

    public function before(User $user, $ability)
    {
    }

    public function index(User $user)
    {
        return $user->tokenCan('check-status');
    }

    public function store(User $user, string $saluto)
    {
        return !!$user;
    }

    public function show(User $user, Post $post)
    {
        return true;
    }

    public function update(User $user, Post $post)
    {
        return $post->user_id === $user->id;
    }

    public function delete(User $user, Post $post)
    {
        return $post->user_id === $user->id;
    }
}
