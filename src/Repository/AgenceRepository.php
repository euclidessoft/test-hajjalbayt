<?php

namespace App\Repository;

/**
 * AgenceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AgenceRepository extends \Doctrine\ORM\EntityRepository
{
	public function Agence($agence)// selection des agence au niveau des regroupement
	{
		// On passe par le QueryBuilder vide de l'EntityManager pour l'exemple
		$query = $this ->createQueryBuilder('a') 
					->Where('a.agence = :agence')
					->setParameter('agence', $agence);
					return $query;
	}
}
