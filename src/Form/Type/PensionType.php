<?php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PensionType extends AbstractType
{
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
						'choices' => array(
							'Pension complète' => 'Pension complète',
							'Demi-pension' => 'Demi-pension',
							)
						));
	}
	public function getParent()
	{
		return ChoiceType::class;
	}

}