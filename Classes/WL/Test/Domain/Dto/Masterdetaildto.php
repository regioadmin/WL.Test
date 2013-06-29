<?php
namespace WL\Test\Domain\Dto;
use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

class Masterdetaildto {

	/**
	 * @var \WL\Test\Domain\Model\Master
	 */
	protected $master;

	/**
	 * @var \WL\Test\Domain\Model\Detail
	 */
	protected $detail;


	/**
	 * Get the Mastere's master
	 *
	 * @return \WL\Tet\Domain\Model\Master
	 */
	public function getMaster() {
		return $this->master;
	}

	/**
	 * Sets this Mastere's master
	 *
	 * @param \WL\Test\Domain\Model\Master $master
	 * @return void
	 */
	public function setMaster($master) {
		$this->master = $master;
	}

	/**
	 * Get the Mastere's masterwohnraum
	 *
	 * @return \WL\Test\Domain\Model\Detail
	 */
	public function getDetail() {
		return $this->detail;
	}

	/**
	 * Sets this Mastere's masterwohnraum
	 *
	 * @param \WL\Test\Domain\Model\Detail $detail
	 * @return void
	 */
	public function setDetail($detail) {
		$this->detail = $detail;

	}
}
?>
