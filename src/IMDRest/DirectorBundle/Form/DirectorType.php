<?php
namespace IMDRest\DirectorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DirectorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("nombre", "text")
                ->add("apellidos", "text")
                ->add("fechaNacimiento", "date")
                ->add("lugarNacimiento", "text")
                ->add("pais", "number")
                ->add("bio", "textarea")
                ->add("slug", "text")
        ;        
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'        => "IMDRest\DirectorBundle\Entity\Director",
            'csrf_protection'   => false,
        ));
    }

    public function getName()
    {
        return 'director';
    }
            
}
