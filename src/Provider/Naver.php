<?php

namespace SktT1Byungi\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\ResponseInterface;

class Naver extends AbstractProvider
{
    use BearerAuthorizationTrait;

    public function getBaseAuthorizationUrl()
    {
        return 'https://nid.naver.com/oauth2.0/authorize';
    }

    public function getBaseAccessTokenUrl(array $params)
    {
        return "https://nid.naver.com/oauth2.0/token";
    }

    protected function getAccessTokenMethod()
    {
        return static::METHOD_GET;
    }

    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        return "https://openapi.naver.com/v1/nid/me";
    }

    protected function getDefaultScopes()
    {
        return [];
    }

    protected function checkResponse(ResponseInterface $response, $data)
    {
        if ($response->getStatusCode() !== 200) {
            throw new IdentityProviderException($data['errorMessage'], $data['errorCode'], $response);
        }
    }

    protected function createResourceOwner(array $response, AccessToken $token)
    {
        return new NaverUser($response);
    }
}