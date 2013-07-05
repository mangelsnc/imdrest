<?php
namespace IMDRest\DirectorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DirectorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("nombre", "text", array(
                    "description" => "Nombre del director"
                ))
                ->add("fechaNacimiento", "date", array(
                    "widget" => "single_text", 
                    "description" => "Fecha de nacimiento en formato ISO",
                    "required" => false
                ))
                ->add("lugarNacimiento", "text", array(
                    "description" => "Lugar de nacimiento del director",
                    "required" => false
                ))
                ->add("pais", "text", array(
                    "description" => "Pais de origen del director",
                    "required" => false
                ))
                ->add("bio", "text", array(
                    "description" => "Breve biografia del director",
                    "required" => false
                ))
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
