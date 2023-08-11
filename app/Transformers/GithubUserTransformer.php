<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class GithubUserTransformer extends TransformerAbstract
{
    public function transform($record)
    {
        return [
            'bio' => $record['bio'],
            'html_url' => $record['html_url'],
            'group' => $record['followers'] > 1000 ? 'Expert' : 'Novice'
        ];
    }
}
