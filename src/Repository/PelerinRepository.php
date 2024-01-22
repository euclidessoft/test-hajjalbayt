<?php

namespace App\Repository;

use App\Entity\Pelerin;

/**
 * PelerinRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PelerinRepository extends \Doctrine\ORM\EntityRepository
{
	public function Less($session,$annee)
	{	
		$annee = $annee.'-01-01';
		$query = $this->createQueryBuilder('a')
					->Where('a.sexe = :genre')
					->setParameter('genre', 'Feminin')
					->AndWhere('a.session = :session')
					->setParameter('session', $session)
					->AndWhere('a.datenaiss >= :annee')
					->setParameter('annee', $annee)
					->getQuery();
		return $query->getResult();
	}
	public function Old($session,$annee)
	{	
		$annee = $annee.'-01-01';
		$query = $this->createQueryBuilder('a')
					->Where('a.session = :session')
					->setParameter('session', $session)
					->AndWhere('a.datenaiss <= :annee')
					->setParameter('annee', $annee)
					->getQuery();
		return $query->getResult();
	}
	
	public function parrain($session,$annee)
	{
		$query = $this->createQueryBuilder('a')
					->Where('a.sexe = :genre')
					->setParameter('genre', 'Masculin')
					->AndWhere('a.session = :session')
					->setParameter('session', $session)
					->AndWhere('a.datenaiss >= :annee')
					->setParameter('annee', $annee)
					->getQuery();
		return $query->getResult();
	}
	
	public function ArchiveLess($agence, $session)
	{	// Pelerin moins de 45ans
		$qb = $this->createQueryBuilder('a');
		$query = $qb->Where('a.sexe = :genre')
					->setParameter('genre', 'Feminin')
					->AndWhere('a.agence = :agence')
					->setParameter('agence', $agence)
					->AndWhere('a.session = :session')
					->setParameter('session', $session)
					->AndWhere($qb->expr()->isNotNull('a.parrain'))
					->getQuery();
		return $query->getResult();
	}
	public function remark($session)
	{	
		$query = $this->createQueryBuilder('a')
					->Where('a.diabete = :diabete')
					->setParameter('diabete', true)
					->orWhere('a.handicap = :handicap')
					->setParameter('handicap', true)
					->orWhere('a.nonvoyant = :nonvoyant')
					->setParameter('nonvoyant', true)
					->orWhere('a.hypo = :hypo')
					->setParameter('hypo', true)
					->orWhere('a.hyper = :hyper')
					->setParameter('hyper', true)
					->orWhere('a.remark != :remark')
					->setParameter('remark', '')
					->andWhere('a.session = :session')
					->setParameter('session', $session)
					->getQuery();
		return $query->getResult();
	}
	
	public function other($agence, $session)
	{
		
			$query = $this->createQueryBuilder('a')
					->Where('a.session = :session')
					->setParameter('session', $session)
					->andWhere('a.agence != :agence')
					->setParameter('agence', $agence)
					->getQuery();
		return $query->getResult();
	}
	public function occupation($session,$chambre, array $pel)
	{	
		$query = $this->createQueryBuilder('a');
				$query->update(Pelerin::class,'a')
					->set('a.chambre', $chambre)
					->where($query->expr()->in('a.id', $pel))
					->AndWhere('a.session = :session')
					->setParameter('session', $session);
		return $query->getQuery()->execute();
	}
	
	public function occupationMecque($session,$chambre, array $pel)
	{	
		$query = $this->createQueryBuilder('a');
				$query->update(Pelerin::class,'a')
					->set('a.chambremecque', $chambre)
					->where($query->expr()->in('a.id', $pel))
					->AndWhere('a.session = :session')
					->setParameter('session', $session);
		return $query->getQuery()->execute();
	}
	
	public function volEmbarquer($session,$vol, array $pel)
	{	
		$query = $this->createQueryBuilder('a');
				$query->update(Pelerin::class,'a')
					->set('a.vol', $vol)
					->where($query->expr()->in('a.id', $pel))
					->AndWhere('a.session = :session')
					->setParameter('session', $session);
		return $query->getQuery()->execute();
	}
	
	public function volDebarquer($session, array $pel)
	{	
		$query = $this->createQueryBuilder('a');
				$query->update(Pelerin::class,'a')
					->set('a.vol', ':vol')
					->setParameter('vol', null)
					->where($query->expr()->in('a.id', $pel))
					->AndWhere('a.session = :session')
					->setParameter('session', $session);
		return $query->getQuery()->execute();
	}
	
	public function retourEmbarquer($session,$vol, array $pel)
	{	
		$query = $this->createQueryBuilder('a');
				$query->update(Pelerin::class,'a')
					->set('a.retour', $vol)
					->where($query->expr()->in('a.id', $pel))
					->AndWhere('a.session = :session')
					->setParameter('session', $session);
		return $query->getQuery()->execute();
	}
	
	public function retourDebarquer($session, array $pel)
	{	
		$query = $this->createQueryBuilder('a');
				$query->update(Pelerin::class,'a')
					->set('a.retour', ':vol')
					->setParameter('vol', null)
					->where($query->expr()->in('a.id', $pel))
					->AndWhere('a.session = :session')
					->setParameter('session', $session);
		return $query->getQuery()->execute();
	}
	
	public function busEmbarquer($session,$bus, array $pel)
	{	
		$query = $this->createQueryBuilder('a');
				$query->update(Pelerin::class,'a')
					->set('a.bus', $bus)
					->where($query->expr()->in('a.id', $pel))
					->AndWhere('a.session = :session')
					->setParameter('session', $session);
		return $query->getQuery()->execute();
	}
	
	public function busDescendre($session, array $pel)
	{	
		$query = $this->createQueryBuilder('a');
				$query->update(Pelerin::class,'a')
					->set('a.bus', ':bus')
					->setParameter('bus', null)
					->where($query->expr()->in('a.id', $pel))
					->AndWhere('a.session = :session')
					->setParameter('session', $session);
		return $query->getQuery()->execute();
	}
	
	public function affectation($session,$imam, array $pel)
	{	
		$query = $this->createQueryBuilder('a');
				$query->update(Pelerin::class,'a')
					->set('a.residimam', $imam)
					->where($query->expr()->in('a.id', $pel))
					->AndWhere('a.session = :session')
					->setParameter('session', $session);
		return $query->getQuery()->execute();
	}
	
	public function annulation($session, array $pel)
	{	
		$query = $this->createQueryBuilder('a');
				$query->update(Pelerin::class,'a')
					->set('a.residimam', ':imam')
					->setParameter('imam', null)
					->where($query->expr()->in('a.id', $pel))
					->AndWhere('a.session = :session')
					->setParameter('session', $session);
		return $query->getQuery()->execute();
	}
	public function affectationDeux($session,$imam, array $pel)
	{	
		$query = $this->createQueryBuilder('a');
				$query->update(Pelerin::class,'a')
					->set('a.imam', $imam)
					->where($query->expr()->in('a.id', $pel))
					->AndWhere('a.session = :session')
					->setParameter('session', $session);
		return $query->getQuery()->execute();
	}
	
	public function annulationDeux($session, array $pel)
	{	
		$query = $this->createQueryBuilder('a');
				$query->update(Pelerin::class,'a')
					->set('a.imam', ':imam')
					->setParameter('imam', null)
					->where($query->expr()->in('a.id', $pel))
					->AndWhere('a.session = :session')
					->setParameter('session', $session);
		return $query->getQuery()->execute();
	}

	public function Antecedent($session)
	{	
		$query = $this->createQueryBuilder('a')
					->Where('a.medical != :genre')
					->setParameter('genre', "")
					->AndWhere('a.session = :session')
					->setParameter('session', $session)
					->getQuery();
		return $query->getResult();
	}
}