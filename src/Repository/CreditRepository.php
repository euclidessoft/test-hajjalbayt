<?php

namespace App\Repository;

use App\Entity\Credit;

/**
 * CreditRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CreditRepository extends \Doctrine\ORM\EntityRepository
{
	public function brouyard($session)
	{
		$query = $this->createQueryBuilder('a')
					->Where('a.date = :genre')
					->setParameter('genre', date('Y-m-d'))
					->andWhere('a.session = :session')
					->setParameter('session', $session)
					->getQuery();
		return $query->getResult();
	}
	public function daybrouyard($date, $session)
	{
		$query = $this->createQueryBuilder('a')
					->Where('a.date = :genre')
					->setParameter('genre', $date)
					->andWhere('a.session = :session')
					->setParameter('session', $session)
					->getQuery();
		return $query->getResult();
	}

	public function delCredit($session, array $pel)
	{	
		$query = $this->createQueryBuilder('a');
				$query->remove(Credit::class,'a')
					->where($query->expr()->in('a.id', $pel))
					->AndWhere('a.session = :session')
					->setParameter('session', $session);
		return $query->getQuery()->execute();
	}

	public function plage($date, $date1, $session)
	{
		$query = $this->createQueryBuilder('a')
					->Where('a.date BETWEEN :debut AND :fin')
					->setParameter('debut', $date)
					->setParameter('fin', $date1)
					->andWhere('a.session = :session')
					->setParameter('session', $session)
					->getQuery();
		return $query->getResult();
	}

	public function ouverture($session)
	{
		$query = $this->createQueryBuilder('a')
					->Where('a.date < :genre')
					->setParameter('genre', date('Y-m-d'))
					->andWhere('a.session = :session')
					->setParameter('session', $session)
					->getQuery();
		return $query->getResult();
	}

	public function ouvertureplace($datedebut, $session)
	{
		$query = $this->createQueryBuilder('a')
					->Where('a.date < :genre')
					->setParameter('genre', $datedebut)
					->andWhere('a.session = :session')
					->setParameter('session', $session)
					->getQuery();
		return $query->getResult();
	}
}