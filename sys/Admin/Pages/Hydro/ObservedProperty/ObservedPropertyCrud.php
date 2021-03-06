<?php

namespace Environet\Sys\Admin\Pages\Hydro\ObservedProperty;

use Environet\Sys\Admin\Pages\CrudPage;
use Environet\Sys\General\Db\HydroObservedPropertyQueries;
use Environet\Sys\General\Exceptions\HttpNotFoundException;
use Environet\Sys\General\Exceptions\RenderException;
use Environet\Sys\General\Response;

/**
 * Class ObservedPropertyCrud
 *
 * Handles CRUD operations for hydropoint observed properties.
 *
 * @package Environet\Sys\Admin\Pages\Hydro\ObservedProperty
 * @author  SRG Group <dev@srg.hu>
 */
class ObservedPropertyCrud extends CrudPage {

	/**
	 * @inheritdoc
	 */
	protected $queriesClass = HydroObservedPropertyQueries::class;

	/**
	 * @inheritdoc
	 */
	protected $indexTemplate = '/hydro/observed-property/index.phtml';

	/**
	 * @inheritdoc
	 */
	protected $formTemplate = 'hydro/observed-property/form.phtml';

	/**
	 * @inheritdoc
	 */
	protected $showTemplate = 'hydro/observed-property/show.phtml';

	/**
	 * @inheritdoc
	 */
	protected $listPagePath = '/admin/hydro/observed-properties';

	/**
	 * @inheritdoc
	 */
	protected $successAddMessage = 'Observed property successfully saved';


	/**
	 * @inheritDoc
	 */
	protected function validateData(array $data): bool {
		$valid = true;

		if (!validate($data, 'symbol', REGEX_ALPHANUMERIC, true)) {
			$this->addMessage('Observed property symbol is empty, or format is invalid', self::MESSAGE_ERROR);
			$valid = false;
		}

		return $valid;
	}


}
