<?php

namespace App\Form\Type\SignatureAuthenticity;

use App\Entity\SignatureAuthenticity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Validator\Constraints\Regex;

class SignatureAuthenticityType extends AbstractType
{
    private $translator;
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }
   
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => $this->translator->trans('Title'),
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => false,
                'row_attr' => [
                    'class' => 'mb-3',
                ],
            ])
            ->add('name', TextType::class, [
                'label' => $this->translator->trans('Name'),
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true, 
                'row_attr' => [
                    'class' => 'mb-3',
                ],
            ])
            ->add('lastname', TextType::class, [
                'label' => $this->translator->trans('Lastname'),
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true, 
                'row_attr' => [
                    'class' => 'mb-3',
                ],
            ])
            ->add('birthdate', DateType::class, [
                'label' => $this->translator->trans('Birthdate'),
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true, 
                'row_attr' => [
                    'class' => 'mb-3',
                ],
            ])
            ->add('birthplace', TextType::class, [
                'label' => $this->translator->trans('Birthplace'),
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true, 
                'row_attr' => [
                    'class' => 'mb-3',
                ],
            ])
            ->add('street', TextType::class, [
                'label' => $this->translator->trans('Street'),
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true, 
                'row_attr' => [
                    'class' => 'mb-3',
                ],
            ])
            ->add('zip', TextType::class, [
                'label' => $this->translator->trans('ZIP'),
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true, 
                'row_attr' => [
                    'class' => 'mb-3',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^\d{3} \d{2}$/',
                        'message' => 'Please enter a valid ZIP code (e.g., 123 45)',
                    ]),
                ],
            ])
            ->add('city', TextType::class, [
                'label' => $this->translator->trans('City'),
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true, 
                'row_attr' => [
                    'class' => 'mb-3',
                ],
            ])
            ->add('proof_of_identity', TextType::class, [
                'label' => $this->translator->trans('Proof of identity'),
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => true, 
                'row_attr' => [
                    'class' => 'mb-3',
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => "Uložit",
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
                
            ]);


            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SignatureAuthenticity::class,
        ]);
    }
}
