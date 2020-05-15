<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
?>

<? if (count($arResult['USERS']) > 0) { ?>
    <div class="users-list">
        <div class="d-flex mb-4 justify-content-between">
            <div>
                <a href="<?=$APPLICATION->GetCurPage();?>?template=csv" target="_blank"
                   class="btn btn-primary users-list__export-csv"><?= GetMessage('ARTICLE_MEDIA_USERS_CSV'); ?></a>
            </div>
            <div>
                <a href="javascript:void(0);" data-href="<?=$APPLICATION->GetCurPage();?>?template=xml"
                   class="btn btn-warning users-list__export-xml"><?= GetMessage('ARTICLE_MEDIA_USERS_XML'); ?></a>
            </div>
        </div>
        <table class="table users-list bem">
            <tr>
                <th><?= GetMessage('ARTICLE_MEDIA_USERS_ID'); ?></th>
                <th><?= GetMessage('ARTICLE_MEDIA_USERS_LOGIN'); ?></th>
                <th><?= GetMessage('ARTICLE_MEDIA_USERS_NAME'); ?></th>
                <th><?= GetMessage('ARTICLE_MEDIA_USERS_LAST_LOGIN'); ?></th>
            </tr>

			<? foreach ($arResult['USERS'] as $key => $user) { ?>
                <tr id="user_<?= $user['ID'] ?>">
                    <td><?= $user['ID'] ?></td>
                    <td><?= $user['LOGIN'] ?></td>
                    <td><? echo $user['LAST_NAME'] . ' ' . $user['NAME']; ?></td>
					<td><?= $user['LAST_LOGIN'] ?></td>
                </tr>
			<? } ?>

        </table>
        <?
        $APPLICATION->IncludeComponent(
            "bitrix:main.pagenavigation",
            "",
            array(
                "NAV_OBJECT" => $arResult['NAVIGATION'],
            ),
            $component
        );
        ?>
    </div>
<? } ?>
