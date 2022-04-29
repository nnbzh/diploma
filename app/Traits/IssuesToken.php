<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait IssuesToken
{
    public function issueToken(Request $request, $grant = 'password', $scope = '')
    {
        $params = [
            'grant_type'    => $grant,
            'client_id'     => env('PASSPORT_CLIENT_ID'),
            'client_secret' => env('PASSPORT_CLIENT_SECRET'),
            'scope'         => $scope,
        ];

        if ($grant === 'password') {
            $request->request->add(['username' => $request->get('email')]);
            $request->request->remove('email');
        }

        $request->request->add($params);

        $proxy = Request::create('oauth/token', 'POST', $request->request->all());
        $pipeline = app()->handle($proxy);

        if (! $pipeline->isSuccessful()) {
            $pipeline->throwResponse();
        }

        return $pipeline;
    }

    public function decodeResponse($response) {
        return json_decode($response->getContent());
    }
}
