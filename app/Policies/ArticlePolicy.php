<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view-articles');
    }

    public function view(User $user, Article $article): bool
    {
        return $user->hasPermissionTo('view-articles');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-articles');
    }

    public function update(User $user, Article $article): bool
    {
        if (!$user->hasPermissionTo('edit-articles')) {
            return false;
        }

        // Author can edit their own article
        return $article->created_by === $user->id || $user->hasRole('admin');
    }

    public function delete(User $user, Article $article): bool
    {
        if (!$user->hasPermissionTo('delete-articles')) {
            return false;
        }

        return $article->created_by === $user->id || $user->hasRole('admin');
    }

    public function publish(User $user, Article $article): bool
    {
        return $user->hasPermissionTo('publish-articles');
    }

    public function restore(User $user, Article $article): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, Article $article): bool
    {
        return $user->hasRole('admin');
    }
}
