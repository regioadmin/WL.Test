<?php
namespace WL\Test\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "WL.Test".               *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Master
 *
 * @Flow\Entity
 */
class Master {

	/**
	 * The name
	 * @Flow\Validate(type="NotEmpty")
	 * @var string
	 */
	protected $name;





	/**
	 * Get the Master's name
	 *
	 * @return string The Master's name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets this Master's name
	 *
	 * @param string $name The Master's name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}



}
?>