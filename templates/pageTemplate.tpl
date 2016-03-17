
{config_load file="fullPage.conf" section="setup"}

{include file="header.tpl" title="Dozor game page"}

{include file="navbar.tpl"}

{if $message}
    {include file="message.tpl"}
{/if}

{include file={$mainTpl}}

{include file="footer.tpl"}