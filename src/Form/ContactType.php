<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email as Email;
use Symfony\Component\Validator\Constraints\Length as Length;
use Symfony\Component\Validator\Constraints\NotBlank as NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => false,
                'constraints' => [
                    new NotBlank(message: 'Le nom ne peut pas être vide'),
                    new Length(
                        min: 2,
                        max: 50,
                        minMessage: 'Le nom doit contenir au moins {{ limit }} caractères'
                    ),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'constraints' => [
                    new NotBlank(message: 'L\'email ne peut pas être vide'),
                    new Email(message: 'L\'email est invalide'),
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => false,
                'constraints' => [
                    new NotBlank(message: 'Le message ne peut pas être vide'),
                    new Length(
                        min: 50,
                        max: 2500,
                        minMessage: 'Le message doit contenir au moins {{ limit }} caractères',
                        maxMessage: 'Le message doit contenir au maximum {{ limit }} caractères'
                    ),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'data-turbo' => false,
        ]);
    }
}
