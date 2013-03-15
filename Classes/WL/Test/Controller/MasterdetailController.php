<?php
namespace WL\Test\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "WL.Test".                  *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use \WL\Test\Domain\Dto\Masterdetaildto;

/**
 * masterdetailcontroller for the WL.Test package
 *
 * @Flow\Scope("singleton")
 */
class MasterdetailController extends ActionController {

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
	 * Index action
	 *
	 * @return void
	 */
	public function indexAction() {

	}

	/**
	 *
	 * some Init for properties like floats
	 * @return void
	 */
	public function initializeEditAction() {
		
	}
	/**
	 * Shows a form for editing an existing objektwohnraumobjektdto object
	 *
	 * @param \WL\Test\Domain\Dto\Masterdetaildto $masterdetaildto to edit
	 * @return void
	 */
	public function editAction(Masterdetaildto $masterdetaildto) {
		//
		die("BUMMJ");
		/*
		$input = array(
			'__identity' => '3439'
		);
		$objektwohnraumobjektdto = $propertyMapper->convert($input, 'WL\Test\Domain\Dto\Objektwohnraumobjektdto');
		var_dump($objektwohnraumobjektdto);*/



	}
	/**
	 * New action
	 *
	 * @return void
	 */
	public function newAction() {

	}


	/**
	 *
	 * some Init for properties like floats
	 * @return void
	 */
	public function initializeCreateAction() {

	}



	/**
	 * Adds the given new objektwohnuraumobjekt to the repository
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

}

?>
