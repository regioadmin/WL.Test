<?php
namespace WL\Test\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "WL.Test".               *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

use TYPO3\Flow\Mvc\Controller\ActionController;
use \WL\Test\Domain\Model\Master;

/**
 * Master controller for the WL.Test package 
 *
 * @Flow\Scope("singleton")
 */
class MasterController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \WL\Test\Domain\Repository\MasterRepository
	 */
	protected $masterRepository;

	/**
	 * Shows a list of masters
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('masters', $this->masterRepository->findAll());
	}

	/**
	 * Shows a single master object
	 *
	 * @param \WL\Test\Domain\Model\Master $master The master to show
	 * @return void
	 */
	public function showAction(Master $master) {
		$this->view->assign('master', $master);
	}

	/**
	 * Shows a form for creating a new master object
	 *
	 * @return void
	 */
	public function newAction() {
	}

	/**
	 * Adds the given new master object to the master repository
	 *
	 * @param \WL\Test\Domain\Model\Master $newMaster A new master to add
	 * @return void
	 */
	public function createAction(Master $newMaster) {
		$this->masterRepository->add($newMaster);
		$this->addFlashMessage('Created a new master.');
		$this->redirect('index');
	}

	/**
	 * Shows a form for editing an existing master object
	 *
	 * @param \WL\Test\Domain\Model\Master $master The master to edit
	 * @return void
	 */
	public function editAction(Master $master) {
		$this->view->assign('master', $master);
	}

	/**
	 * Updates the given master object
	 *
	 * @param \WL\Test\Domain\Model\Master $master The master to update
	 * @return void
	 */
	public function updateAction(Master $master) {
		$this->masterRepository->update($master);
		$this->addFlashMessage('Updated the master.');
		$this->redirect('index');
	}

	/**
	 * Removes the given master object from the master repository
	 *
	 * @param \WL\Test\Domain\Model\Master $master The master to delete
	 * @return void
	 */
	public function deleteAction(Master $master) {
		$this->masterRepository->remove($master);
		$this->addFlashMessage('Deleted a master.');
		$this->redirect('index');
	}

}

?>