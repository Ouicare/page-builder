<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ModelEntityType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $classNames = $options['classNames'];
        $builder->add('title', null, array('attr' => array('ng-model' => 'entity.title')))
                ->add('label', null, array('attr' => array('ng-model' => 'entity.label')))
                ->add('description', null, array('attr' => array('ng-model' => 'entity.description')))
                ->add('type', ChoiceType::class, array('choices' => $classNames,
                    'choice_label' => function ($value, $key, $index) {
                        return $value;
                    }, 'label' => 'Entité',
                    'attr' => array('ng-model' => 'entity.type', 'ng-change' => 'getAttributes(entity.type)')
                ))
                ->add('attributes', null, array('attr' => array('ng-model' => 'entity.attributes')));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ModelEntity'
        ));
        $resolver->setDefined(array('classNames'));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_modelentity';
    }

}
