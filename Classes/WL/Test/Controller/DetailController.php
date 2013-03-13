<?php
namespace WL\Test\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "WL.Test".               *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

use TYPO3\Flow\Mvc\Controller\ActionController;
use \WL\Test\Domain\Model\Detail;

/**
 * Detail controller for the WL.Test package
 *
 * @Flow\Scope("singleton")
 */
class DetailController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \WL\Test\Domain\Repository\DetailRepository
	 */
	protected $detailRepository;

	/**
	 * Shows a list of details
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('details', $this->detailRepository->findAll());
	}

	/**
	 * Shows a single detail object
	 *
	 * @param \WL\Test\Domain\Model\Detail $detail The detail to show
	 * @return void
	 */
	public function showAction(Detail $detail) {
		$this->view->assign('detail', $detail);
	}

	/**
	 * Shows a form for creating a new detail object
	 *
	 * @return void
	 */
	public function newAction() {
	}

	/**
	 * Adds the given new detail object to the detail repository
	 *
	 * @param \WL\Test\Domain\Model\Detail $newDetail A new detail to add
	 * @return void
	 */
	public function createAction(Detail $newDetail) {
		$this->detailRepository->add($newDetail);
		$this->addFlashMessage('Created a new detail.');
		$this->redirect('index');
	}

	/* some Init for properties like floats
	* @return void
	*/
	public function initializeEditAction() {
		$this->arguments['detail']->getPropertyMappingConfiguration()->allowProperties('__identity');
	}


	/**
	 * Shows a form for editing an existing detail object
	 *
	 * @param \WL\Test\Domain\Model\Detail $detail The detail to edit
	 * @return void
	 */
	public function editAction(Detail $detail) {
		$this->view->assign('detail', $detail);
	}

	/**
	 * Updates the given detail object
	 *
	 * @param \WL\Test\Domain\Model\Detail $detail The detail to update
	 * @return void
	 */
	public function updateAction(Detail $detail) {
		$this->detailRepository->update($detail);
		$this->addFlashMessage('Updated the detail.');
		$this->redirect('index');
	}

	/**
	 * Removes the given detail object from the detail repository
	 *
	 * @param \WL\Test\Domain\Model\Detail $detail The detail to delete
	 * @return void
	 */
	public function deleteAction(Detail $detail) {
		$this->detailRepository->remove($detail);
		$this->addFlashMessage('Deleted a detail.');
		$this->redirect('index');
	}

}

?>