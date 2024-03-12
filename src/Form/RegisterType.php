<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;


class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom',
                'constraints' => new Length([
                'min' => 2,
                'max' => 30
                ]),
                'attr' => [
                    'placeholder' => 'Prénom'
                ]
            ])

            ->add('lastname', TextType::class, [
                'label' => 'Votre nom',
                'constraints' => new Length ([
                    'min' => 2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => 'Nom de famille'
                ]
            ])

            ->add('email', EmailType::class, [
                'label' => 'Votre email',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 55
                ]),
                'attr' => [
                    'placeholder' => 'adresse@example.com'
                ]
            ])

            ->add('password', PasswordType::class, [
                'attr' => [
                    'placeholder' => 'Créez un mot de passe'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le mot de passe est obligatoire',
                    ]),
                    new Regex([
                        'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).{10,}$/',
                        'message' => 'Le mot de passe doit contenir au moins 10 caractères, dont une majuscule, une minuscule, un chiffre et un caractère spécial.',
                    ]),
                ],
            ])

            ->add('phone', TelType::class, [
                'label' => 'Votre numéro de téléphone',
                'required' => false, // Selon que ce champ soit obligatoire ou non
                'constraints' => [
                    new Length([
                        'min' => 10,
                        'max' => 10,
                        'exactMessage' => 'Le numéro de téléphone doit contenir 10 chiffres.',
                    ]),
                ],
                'attr' => [
                    'placeholder' => '0606060606'
                ]
            ])

            ->add('address', TextType::class, [
                'label' => 'Votre adresse',
                'constraints' => [
                    new NotBlank([
                        'message' => 'L\'adresse est obligatoire',
                    ]),
                ],
                'attr' => [
                    'placeholder' => '123 rue d\'exemple'
                ]
            ])

            ->add('postalCode', TextType::class, [
                'label' => 'Votre code postal',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le code postal est obligatoire',
                    ]),
                    new Length([
                        'min' => 5,
                        'max' => 5,
                        'exactMessage' => 'Le code postal doit contenir 5 chiffres.',
                    ]),
                ],
                'attr' => [
                    'placeholder' => '75001'
                ]
            ])

            ->add('city', TextType::class, [
                'label' => 'Votre ville',
                'constraints' => [
                    new NotBlank([
                        'message' => 'La ville est obligatoire',
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'Paris'
                ]
            ])


            ->add('sInscrire', SubmitType::class, [
                'label' => 'S\'inscrire',
                'attr' => ['class' => 'btn btn-primary'],
            ])            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
