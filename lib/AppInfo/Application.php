<?php
/**
 * CMS Pico - Create websites using Pico CMS for Nextcloud.
 *
 * @copyright Copyright (c) 2017, Maxence Lange (<maxence@artificial-owl.com>)
 * @copyright Copyright (c) 2019, Daniel Rudolf (<picocms.org@daniel-rudolf.de>)
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

declare(strict_types=1);

namespace OCA\CMSPico\AppInfo;

use OCP\AppFramework\App;
use OCP\Util;

class Application extends App
{
	/** @var string */
	const APP_NAME = 'cms_pico';

	/**
	 * @param array $params
	 */
	public function __construct(array $params = [])
	{
		parent::__construct(self::APP_NAME, $params);

		$this->registerAutoloader();
		$this->registerHooks();
	}

	/**
	 * Register autoloader.
	 */
	public function registerAutoloader()
	{
		$composerDir = __DIR__ . '/../../vendor/';
		if (is_dir($composerDir) && file_exists($composerDir . 'autoload.php')) {
			require_once($composerDir . 'autoload.php');
		}
	}

	/**
	 * Register hooks.
	 */
	public function registerHooks()
	{
		Util::connectHook(
			'OC_User', 'post_deleteUser', '\OCA\CMSPico\Hooks\UserHooks', 'onUserDeleted'
		);
	}
}

