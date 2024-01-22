<?php

namespace App\Repository;

/**
 * MedicalRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MedicalRepository extends \Doctrine\ORM\EntityRepository
{

	public function Antecedent($session)
	{	
		$query = $this->createQueryBuilder('a')
					->Where('a.hta = :genre')
					->setParameter('genre', true)
					->orWhere('a.diabete = :diabete')
					->setParameter('diabete', true)
					->orWhere('a.asthme = :asthme')
					->setParameter('asthme', true)
					->orWhere('a.drepano = :drepano')
					->setParameter('drepano', true)
					->orWhere('a.tuberculose = :tuberculose')
					->setParameter('tuberculose', true)
					->orWhere('a.arthrose = :arthrose')
					->setParameter('arthrose', true)
					->AndWhere('a.session = :session')
					->setParameter('session', $session)
					->getQuery();
		return $query->getResult();
	}
}
