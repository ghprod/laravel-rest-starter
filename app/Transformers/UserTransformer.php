<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'uuid' => $user->uuid,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at->__toString(),
            'updated_at' => $user->updated_at->__toString(),
            '_authorization' => [
                'update' => gate('update', $user),
                'destroy' => gate('destroy', $user),
            ],
        ];
    }
}
