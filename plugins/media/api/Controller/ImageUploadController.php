<?php

namespace Media\Controller;

use ApiPlatform\Core\Validator\Exception\ValidationException;
use ApiPlatform\Core\Validator\ValidatorInterface;
use Media\Entity\Images;
use Media\Form\ImageUpload;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class ImageUploadController
{
    private $formFactory;
    private $em;
    private $validator;

    public function __construct(
        FormFactoryInterface $formFactory,
        EntityManagerInterface $entityManager,
        ValidatorInterface $validator
    )
    {
        $this->formFactory = $formFactory;
        $this->em = $entityManager;
        $this->validator = $validator;
    }

    public function __invoke(Request $request)
    {
        $image = new Images();

        $form = $this->formFactory->create(ImageUpload::class, $image);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $image->setInitialTimestamp(new \DateTime());
            $this->em->persist($image);
            $this->em->flush();

            $image->setFile(null);

            return $image;
        }

        throw new ValidationException(
            $this->validator->validate($image)
        );
    }
}
