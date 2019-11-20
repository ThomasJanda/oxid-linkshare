[{*$smarty.block.parent*}]

[{assign var=oLinkShare value=false}]
[{assign var=sTitle value=$sPageTitle}]
[{assign var=sDescription value=$oView->getMetaDescription()}]
[{assign var=sLink value=$oViewConf->getCurrentHomeDir()}]
[{assign var=sImage value=$oConfig->getConfigParam('rs-linkshare_main_logo_url')}]

[{if $oViewConf->getActiveClassName() == 'details'}]
    [{assign var=oObject value=$oView->getProduct()}]
    [{assign var=oLinkShare value=$oObject->rs_linkshare_getLinkShare()}]
        [{assign var=sImage value=$oView->getActPicture()}]
    [{assign var=sLink value=$oView->getCanonicalUrl()}]
[{/if}]
[{if $oViewConf->getActiveClassName() == 'content'}]
    [{assign var=oObject value=$oView->getContent()}]
    [{assign var=oLinkShare value=$oObject->rs_linkshare_getLinkShare()}]
    [{assign var=sLink value=$oView->getCanonicalUrl()}]
[{/if}]
[{if $oViewConf->getActiveClassName() == 'alist'}]
    [{assign var=oObject value=$oView->getActiveCategory()}]
    [{assign var=oLinkShare value=$oObject->rs_linkshare_getLinkShare()}]
    [{assign var=sLink value=$oView->getCanonicalUrl()}]
[{/if}]

[{*$oViewConf->getActiveClassName()*}]

[{if $oLinkShare}]
    [{if $oLinkShare->rs_linkshare__rstitle->value != ""}]
        [{assign var=sTitle value=$oLinkShare->rs_linkshare__rstitle->value}]
    [{/if}]
    [{if $oLinkShare->rs_linkshare__rsdescription->value != ""}]
        [{assign var=sDescription value=$oLinkShare->rs_linkshare__rsdescription->value}]
    [{/if}]
    [{if $oLinkShare->rs_linkshare__rsimage->value != ""}]
        [{assign var=sLink value=$oLinkShare->getUrlFile()}]
    [{/if}]
[{/if}]


<meta property="og:site_name" content="[{$oViewConf->getBaseDir()}]">
<meta property="og:title" content="[{$sTitle}]">
<meta property="og:description" content="[{$sDescription}]">
[{if $oViewConf->getActiveClassName() == 'details'}]
    <meta property="og:type" content="product">
[{else}]
    <meta property="og:type" content="website">
[{/if}]
<meta property="og:image" content="[{$sImage}]">
<meta property="og:url" content="[{$sLink}]">