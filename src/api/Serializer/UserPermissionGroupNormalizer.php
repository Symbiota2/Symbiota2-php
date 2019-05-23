<?php

namespace Core\Serializer;

use Core\Entity\Users;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;

class UserPermissionGroupNormalizer implements ContextAwareNormalizerInterface, SerializerAwareInterface
{
    use SerializerAwareTrait;

    const NORMALIZER_CALLED = 'NORMALIZER_CALLED';

    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function supportsNormalization($data, $format = null, array $context = [])
    {
        if(isset($context[self::NORMALIZER_CALLED])) {
            return false;
        }

        return $data instanceof Users;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        if($this->tokenStorage->getToken()->getUser() instanceof Users) {
            $grantedPermissions = $this->tokenStorage->getToken()->getUser()->getCurrentPermissions();
            foreach ($grantedPermissions as $permission) {
                $context['groups'][] = $permission;
            }

            if($this->checkOwnership($object)) {
                $context['groups'][] = 'owner';
            }
        }

        return $this->passOn($object, $format, $context);
    }

    private function checkOwnership($object)
    {
        if($object instanceof Users) {
            return $object->getId() === $this->tokenStorage->getToken()->getUser()->getId();
        }
        elseif(method_exists($object,'getCreatedUserId')) {
            return $object->getCreatedUserId() === $this->tokenStorage->getToken()->getUser();
        }

        return false;
    }

    private function passOn($object, $format, $context)
    {
        if(!$this->serializer instanceof NormalizerInterface) {
            throw new \LogicException(sprintf('Cannot normalize object "%s" because the injected serializer is not a normalizer.', $object));
        }

        $context[self::NORMALIZER_CALLED] = true;

        return $this->serializer->normalize($object, $format, $context);
    }

}
