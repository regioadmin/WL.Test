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
	 * The detail1
	 * @var string
	 */
	protected $detail1;

	/**
	 * The detail2
	 * @var string
	 */
	protected $detail2;

	/**
	 * The master
	 * @var \WL\Test\Domain\Model\Master
	 * @ORM\ManyToOne(inversedBy="detail", cascade={"remove"})
	 */
	protected $master;

	/**
	 * Get the Detail's detail1
	 *
	 * @return string The Detail's detail1
	 */
	public function getDetail1() {
		return $this->detail1;
	}

	/**
	 * Sets this Detail's detail1
	 *
	 * @param string $detail1 The Detail's detail1
	 * @return void
	 */
	public function setDetail1($detail1) {
		$this->detail1 = $detail1;
	}

	/**
	 * Get the Detail's detail2
	 *
	 * @return string The Detail's detail2
	 */
	public function getDetail2() {
		return $this->detail2;
	}

	/**
	 * Sets this Detail's detail2
	 *
	 * @param string $detail2 The Detail's detail2
	 * @return void
	 */
	public function setDetail2($detail2) {
		$this->detail2 = $detail2;
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