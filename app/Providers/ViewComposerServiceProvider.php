<?php

namespace App\Providers;

use App\CustomSetting;
use App\Language;
use App\LanguageCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		//
		view()->composer('system.sidebar', function ($view) {
			$modules = config('cmsconfig.modules');
			$modulePages = config('cmsconfig.modulepages');
			$modulePermissions = config('cmsconfig.modulepermissions');
			$moduleIcons = config('cmsconfig.moduleicons');
			$userPermission = Auth::guard("web")->user()->permission;
			$allData = [];
			if (Auth::guard("web")->user()->isSuperUser()) {
				//Checking if superuser or not
				foreach ($modules as $moduleID => $moduleTitle) {
					if(!array_key_exists($moduleID,$modulePermissions))
						continue;
					$arrayData['id'] = $moduleID;
					$arrayData['title'] = $moduleTitle;
					$arrayData['pages'] = count($modulePages[$moduleID]);
					$arrayData['subPages'] = $modulePages[$moduleID];
					foreach ($moduleIcons as $id => $icons) {
						if ($id == $moduleID) {
							$arrayData['icon'] = $icons;
						}
					}
					array_push($allData, $arrayData);
				}
			} else {

				$permissions = Auth::guard("web")->user()->allUserPermission();
				$userPermission = array_intersect_key($permissions, $modules);
				foreach ($userPermission as $k => $module) {
					$arrayData['id'] = $k;
					$arrayData['title'] = $modules[$k];
					$subModule = array();
					$count = 0;
					foreach ($modulePages[$k] as $subModuleId => $subModuleTitle) {
						$count++;
						foreach ($module as $m => $v) {
							if (preg_match("/\b$subModuleId\b/i", $m)) {
								$subModule[$subModuleId] = $subModuleTitle;
							}

						}
					}
					$arrayData['subPages'] = $subModule;
					$arrayData['pages'] = $count;
					foreach ($moduleIcons as $id => $icons) {
						if ($id == $k) {
							$arrayData['icon'] = $icons;
						}
					}
					array_push($allData, $arrayData);
				}
			}
			$view->with('modulesPermission', $allData);
			return $allData;
		});

		view()->composer('layouts.system', function ($view) {
			$defaultLangId = Session::get('defaultLang');
            if ($defaultLangId) {
              $data['defaultLangDetails'] = Language::find($defaultLangId);
            }else{
              $defLang = LanguageCategory::find(1)->default_lang;
              $data['defaultLangDetails'] = Language::find($defLang);
            }

            $data['langCategories'] = LanguageCategory::find(1);

            return $view->with('data', $data);
		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}
