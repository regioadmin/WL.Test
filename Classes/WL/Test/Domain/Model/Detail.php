<?php
namespace WL\Test\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "WL.Test".               *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Detail
 *
 * @Flow\Entity
 */
class Detail {

	/**
	 * The master
	 * @var \WL\Test\Domain\Model\Master
	 * @ORM\OneToOne(cascade={"persist","remove"})
	 */
	protected $master;

	/**
	 * The descroiption
	 * @var string
	 */
	protected $description;

	/**
	 * The detail2
	 * @var float
	 */
	protected $amount;

	/**
	 * @param float $amount
	 * @return void
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}

	/**
	 * @return float
	 */
	public function getAmount() {
		return $this->amount;
	}

	/**
	 * Get the Detail's description
	 *
	 * @return string The Description's detail
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets this Detail's detail
	 *
	 * @param string $description The Detail's description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}


	/**
	 * @param return \WL\Test\Domain\Model\Master $master
	 * @return void
	 */
	public function setMaster(\WL\Test\Domain\Model\Master $master) {
		$this->master = $master;
	}

	/**
	 * @return \WL\Test\Domain\Model\Master $master
	 */
	public function getMaster() {
		return $this->master;
	}

}
?>