<?php
namespace WL\Test\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "WL.Test".               *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

use TYPO3\Flow\Mvc\Controller\ActionController;
use \WL\Test\Domain\Model\Master;
use \WL\Test\Domain\Dto\Masterdetaildto;

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
	 * @Flow\Inject
	 * @var \WL\Test\Domain\Repository\DetailRepository
	 */
	protected $detailRepository;

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
	 * Adds the given new masterdetail to the repository
	 *
	 * @param \WL\Test\Domain\Dto\Masterdetaildto $newMasterdetaildto
	 * @return void
	 */
	public function createAction(Masterdetaildto $newMasterdetaildto) {

		$modelMaster = $newMasterdetaildto->getMaster();
		$this->masterRepository->add($modelMaster);

		$modelDetail = $newMasterdetaildto->getDetail();
		$modelDetail->setMaster($modelMaster);
		$this->detailRepository->add($modelDetail);

		$this->redirect('index', 'Master');
	}

	/**
	 * Shows a form for editing an existing master object
	 *
	 * @param \WL\Test\Domain\Model\Master $master
	 * @param \WL\Test\Domain\Model\Detail $detail
	 * @return void
	 */
	public function editAction(\WL\Test\Domain\Model\Master $master, \WL\Test\Domain\Model\Detail $detail) {


		$masterAndDetail = new \WL\Test\Domain\Dto\Masterdetaildto($master, $detail);
		$masterAndDetail->setMaster($master);
		$masterAndDetail->setDetail($detail);

		\TYPO3\FLOW\var_dump($masterAndDetail);
		$this->view->assign('masterAndDetail', $masterAndDetail);


	}

	/**
	 * Updates the given master object
	 *
	 * aram \WL\Test\Domain\Model\Master $master The master to update
	 * @param \WL\Test\Domain\Dto\Masterdetaildto $masterAndDetail
	 * \WL\Test\Domain\Model\Master $master
	 * @return void
	 */
	public function updateAction(\WL\Test\Domain\Dto\Masterdetaildto $masterAndDetail) {


		$modelDetail=$masterAndDetail->getDetail();
		\TYPO3\FLOW\var_dump($modelDetail);
		$this->detailRepository->update($modelDetail);

		$modelMaster= new \WL\Test\Domain\Model\Master;
		$modelMaster=$masterAndDetail->getMaster();
		\TYPO3\FLOW\var_dump($modelMaster);
		$this->masterRepository->update($modelMaster);

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