 <?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */

/** @global CMain $APPLICATION */

use \Bitrix\Main\{
    UserTable,
    UI\PageNavigation,
    Application
};

class ContentLKSectionList extends CBitrixComponent
{
    /**
     * Допустимые шаблоны выгрузки
     * @var array
     */
    private $exportsType = [
        'csv',
        'xml',
    ];

	public function onPrepareComponentParams($arParams)
	{
	    $arParams['PAGE_COUNT'] = $arParams['PAGE_COUNT'] ?? 10;
        $arParams["NAV_ID"] = "nav_users";
        $request = Application::getInstance()->getContext()->getRequest();
        // передаем паарметр страницы, для разделения в кэше
        $arParams["NAV_PAGE"] = htmlspecialchars($request->getQuery($arParams["NAV_ID"]));

        $arParams["TEMPLATE"] = htmlspecialchars($request->getQuery("template"));
        if($arParams["TEMPLATE"] && in_array($arParams["TEMPLATE"], $this->exportsType)){
            // если идет экспорт, то не кэшировать и не ограничивать
            $arParams["CACHE_TYPE"] = "N";
            unset($arParams['PAGE_COUNT']);
        }
		return $arParams;
	}
	

	public function executeComponent()
	{
	    // кэширование
		if ($this->startResultCache()) { // TODO добавить тег кэша
            $nav = new PageNavigation($this->arParams["NAV_ID"]);
            $nav->allowAllRecords(true)
                ->setPageSize($this->arParams['PAGE_COUNT'])
                ->initFromUri();

            $usersList = UserTable::getList(array(
                'order' => array('LAST_NAME'=>'DESC'),
                "count_total" => true,
                "offset" => $nav->getOffset(),
                "limit" => $nav->getLimit(),
            ));

            $nav->setRecordCount($usersList->getCount());

            while($user = $usersList->fetch()){
                $this->arResult['USERS'][] = $user;
            }
            $this->arResult['NAVIGATION'] = $nav;
			$this->includeComponentTemplate($this->arParams['TEMPLATE']);
		}
	}
}

