<?php

namespace rs\linkshare\Application\Model;

class Category extends Category_parent
{

    public function rs_linkshare_getLinkShare()
    {
        $sType = "category";
        $oLinkShare = oxNew(\rs\linkshare\Application\Model\rs_linkshare::class);
        $oLinkShare->load($this->getId(), $sType);
        $oLinkShare->loadTypeInLang($this->getLanguage(), $this->getId(), $sType);
        return $oLinkShare;
    }

}