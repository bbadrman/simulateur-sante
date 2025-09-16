<?php

namespace App\Form;

use App\Entity\Sante;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type as Type;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\Length;

class SanteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('nom', Type\TextType::class, [
                'label' => 'Nom  ',
                'attr' => [

                    'placeholder' => 'Tapez Votre Nom'
                ],
                'required' => false,
                // 'constraints' => new NotBlank(['message' => 'ne peut pas etre vide'])
            ])
            ->add('prenom', Type\TextType::class, [
                'label' => 'Prenom ',
                'attr' => [

                    'placeholder' => 'Tapez votre Prenom'
                ],
                'required' => true,
                // 'constraints' => new NotBlank(['message' => 'ne peut pas etre vide'])
            ])
            ->add('brithdate', DateType::class, [
                'label' => 'Date de Naissance',
                'widget' => 'single_text',
                'required' => true,
                'html5' => true,
                'format' => 'yyyy-MM-dd',
            ])

            ->add('postal', TextType::class, [
                'label' => 'Code Postal  ',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Merci de saisir le Code Postal',
                ]
            ])
            ->add('regimSocial', Type\ChoiceType::class, [
                'label' => 'Régime social ',
                'required' => true,
                'placeholder' => '--Merci de selectie-- ',
                'choices' => [
                    'GENERAL' => 'GENERAL',
                    'TNS' => 'TNS',
                    'AGRICOLE' => 'AGRICOLE',
                    'ALSACE MOSELLE' => 'ALSACE MOSELLE',

                ],
                'expanded' => false,
                'multiple' => false
            ])
            ->add('benificaire', Type\ChoiceType::class, [
                'label' => 'Bénéficiaires ? ',
                'required' => true,
                'placeholder' => '--Merci de sélectionner-- ',
                'choices' => [
                    'Oui' => 'OUI',
                    'Non' => 'NON',

                ],
                'expanded' => false,

            ])
            ->add('nbrBenific', Type\ChoiceType::class, [
                'label' => 'Nombre de bénéficiaires ',
                'required' => false,
                'placeholder' => '--Merci de selectie-- ',
                'choices' => array_combine(range(1, 4), range(1, 4)),
                'attr' => [
                    'class' => 'form-control',
                    'data-controller' => 'reglement-updater'
                ],
            ])


            ->add('date1', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
                'input' => 'string', // 👈 très important
                'format' => 'yyyy-MM-dd',
            ])
            ->add('date2', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
                'input' => 'string', // 👈 très important
                'format' => 'yyyy-MM-dd',
            ])
            ->add('date3', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
                'input' => 'string', // 👈 très important
                'format' => 'yyyy-MM-dd',
            ])
            ->add('date4', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
                'input' => 'string', // 👈 très important
                'format' => 'yyyy-MM-dd',
            ])
            ->add('tel', Type\TelType::class, [
                'label' => 'Téléphone',
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
                    'placeholder' => '01 23 45 67 89',
                    'pattern' => '[0-9]{10}',
                    'maxlength' => 10
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
