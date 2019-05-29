<?php
/**
 * CMS Pico - Create websites using Pico CMS for Nextcloud.
 *
 * @copyright Copyright (c) 2017, Maxence Lange (<maxence@artificial-owl.com>)
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCA\CMSPico\Events;

use OCA\CMSPico\Service\MiscService;
use OCA\CMSPico\Service\WebsitesService;

class UserEvents
{
	/** @var WebsitesService */
	private $websitesService;

	/** @var MiscService */
	private $miscService;

	public function __construct(WebsitesService $websitesService, MiscService $miscService)
	{
		$this->websitesService = $websitesService;
		$this->miscService = $miscService;
	}

	/**
	 * @param array $params
	 */
	public function onUserDeleted(array $params)
	{
		$userId = $params['uid'];
		$this->websitesService->onUserRemoved($userId);
	}
}
