
{config_load file="fullPage.conf" section="setup"}

{include file="header.tpl" title="Dozor game page"}

{include file="navbar.tpl"}

{if $MessageModule}
    {$MessageModule}
{/if}

{include file={$mainTpl}}

{include file="footer.tpl"}