<?php

namespace App\Repository;

/**
 * CompteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CompteRepository extends \Doctrine\ORM\EntityRepository
{
	public function Restart()
	{
		$query = $this->createQueryBuilder('a')
					->orderBy('a.id', 'DESC')
					->setFirstResult(0)
					->setMaxResults(1)
					->getQuery();
		foreach($query->getResult() as $compte){}
		return $compte;
	}
}