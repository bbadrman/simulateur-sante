<?php

namespace App\Form;

use App\Entity\Sante; 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type as Type;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\Length;

class SanteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
             ->add('gender', Type\ChoiceType::class, [
                'label' => 'Genre',
                'required' => false,
                'placeholder' => '--Merci de Choisir le genre--',
                'choices' => [
                    'Male' => 'Mr',
                    'Female' => 'Mme'
                ],
                'expanded' => false,
                'multiple' => false
            ])
            ->add('nom', Type\TextType::class, [
                'label' => 'Nom  ',
                'attr' => [

                    'placeholder' => 'Tapez le Nom du Client'
                ],
                'required' => true,
                // 'constraints' => new NotBlank(['message' => 'ne peut pas etre vide'])
            ])
            ->add('prenom', Type\TextType::class, [
                'label' => 'Nom     ',
                'attr' => [

                    'placeholder' => 'Tapez le Nom du Client'
                ],
                'required' => true,
                // 'constraints' => new NotBlank(['message' => 'ne peut pas etre vide'])
            ])
             ->add('brithdate', DateType::class, [
    'label' => 'Date de Naissance',
    'widget' => 'single_text',
    'required' => false,
    'html5' => true,
    'format' => 'yyyy-MM-dd',
])
             
            ->add('postal', TextType::class, [
                'label' => 'Code Postal  ',
                'constraints' => new Length(['min' => 5,  'minMessage' => 'le code postale doit etre quatre caactaire mini', 'max' => 5, 'maxMessage' => 'le code postale doite etre 5 caractaire max']),
                'attr' => [
                    'placeholder' => 'Merci de saisir le Code Postal',
                ]
            ])
            ->add('regimSocial', Type\ChoiceType::class, [
                'label' => 'regim social ',
                'required' => true,
                'placeholder' => '--Merci de selectie-- ',
                'choices' => [
                    'regime1' => 'regime1',
                    'regime2' => 'regime2',
                    'regime3' => 'regime3',
                    'regime4' => 'regime4', 
                     
                ],
                'expanded' => false,
                'multiple' => false
            ])
            ->add('benificaire', Type\ChoiceType::class, [
                'label' => 'benificaire ',
                'required' => true,
                'placeholder' => '--Merci de selectie-- ',
                'choices' => [
                    'Oui' => 'OUI',    
                    'Non' => 'NON',   
                     
                ],
                'expanded' => false,
                'multiple' => false
            ])
            ->add('nbrBenific', Type\ChoiceType::class, [
                'label' => 'nbr Benific ',
                'required' => true,
                'placeholder' => '--Merci de selectie-- ',
                'choices' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                     
                ],
                'expanded' => false,
                'multiple' => false
            ])
            ->add('tel', Type\TelType::class, [
                'label' => 'Téléphone 1 ',
                'required' => true,
                'constraints' => new Length([
                    'min' => 10,
                    'minMessage' => '  
                    le numéro de téléphone doit composer des 10 chiffres y a compris le 0 ',
                    'max' => 10,
                    'maxMessage' => '  
                    le numéro de téléphone doit composer des 10 chiffres y a compris le 0 '
                ]),

                'attr' => [
                    'placeholder' => 'Merci de saisir le numéro de téléphone'
                ]
            ])
            ->add('email', Type\EmailType::class, [
                'label' => 'Email  ',
                'required' => true,
                'attr' => [
                    'placeholder' => "Merci de saisir l'adresse email"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sante::class,
        ]);
    }
}
