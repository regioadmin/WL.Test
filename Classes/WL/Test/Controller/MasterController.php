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
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 */
	protected $persistenceManager;






  	/**
	 * init an action
	 *
	 * @return void
	 */
	public function initializeAction() {
    foreach ($this->arguments as $argument) {
$argument->getPropertyMappingConfiguration()->forProperty('detail.*')->setTypeConverterOption(
	'TYPO3\Flow\Property\TypeConverter\FloatConverter', 'locale', TRUE );
   }

	}



	/**
	 * Shows a list of masters
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('masters', $this->masterRepository->findAll());
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
	 * @return void
	 */
	public function editAction(\WL\Test\Domain\Model\Master $master) {

        $detail=$this->detailRepository->findOneByMaster($master);


		$masterAndDetail = new \WL\Test\Domain\Dto\Masterdetaildto($master,$detail);
		//$masterAndDetail->setMaster($master);
		//$masterAndDetail->setDetail($detail);

		$this->view->assign('masterAndDetail', $masterAndDetail);


	}

	/**
	 * Updates the given master object
	 *
	 * @param \WL\Test\Domain\Dto\Masterdetaildto $masterAndDetail
	 * @param array $master_id
	 * @param array $detail_id
	 * @return void
	 */
	public function updateAction(\WL\Test\Domain\Dto\Masterdetaildto $masterAndDetail,$master_id,$detail_id) {
		//$this->persistenceManager->persistAll();

		//\TYPO3\FLOW\var_dump($masterAndDetail); ==> PROBLEM is that identifiers from both models were changed when validation error
//die(var_dump($id1));

		$modelMaster=$masterAndDetail->getMaster();
		$modelDetail=$masterAndDetail->getDetail();

/*
		\TYPO3\FLOW\var_dump($masterAndDetail);
		\TYPO3\FLOW\var_dump($modelMaster);
		\TYPO3\FLOW\var_dump($modelDetail);
		die("");

*/

		$modelMaster->setIdentifier($master_id["__identity"]);
		$modelDetail->setIdentifier($detail_id["__identity"]);



		$this->masterRepository->update($modelMaster);
		$this->detailRepository->update($modelDetail);


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