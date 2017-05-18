<?php

namespace SktT1Byungi\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class NaverUser implements ResourceOwnerInterface
{
    /**
     * @var array
     */
    private $response;

    public function __construct($response)
    {
        $this->response = $response['response'];
    }

    public function getId()
    {
        return $this->response['id'];
    }

    public function getNickName()
    {
        return $this->response['nickname'];
    }

    public function toArray()
    {
        return $this->response;
    }

    public function getEmail()
    {
        return $this->response['email'];
    }

    public function getProfileImage()
    {
        return $this->response['profile_image'];
    }

    public function getAvatar()
    {
        return $this->getProfileImage();
    }

    public function getAge()
    {
        return $this->response['age'];
    }

    public function getGender()
    {
        return $this->response['gender'];
    }

    public function getName()
    {
        return $this->response['name'];
    }

    public function getBirthDay()
    {
        return $this->response['birthday'];
    }
}