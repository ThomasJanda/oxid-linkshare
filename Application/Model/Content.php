<?php

namespace rs\linkshare\Application\Model;

class Content extends Content_parent
{

    public function rs_linkshare_getLinkShare()
    {
        $sType = "content";
        $oLinkShare = oxNew(\rs\linkshare\Application\Model\rs_linkshare::class);
        $oLinkShare->load($this->getId(), $sType);
        $oLinkShare->loadTypeInLang($this->getLanguage(), $this->getId(), $sType);
        return $oLinkShare;
    }

}