<?php
namespace rs\linkshare\Application\Controller\Admin;

use OxidEsales\Eshop\Core\Request;

class rs_linkshare_article extends \OxidEsales\Eshop\Application\Controller\Admin\AdminController {

    protected $_sThisTemplate='rs_linkshare_article.tpl';
    
    
    
    public function render()
    {
        parent::render();
        
        $this->_aViewData["edit"] = $oArticle = oxNew(\OxidEsales\Eshop\Application\Model\Article::class);

        $soxId = $this->getEditObjectId();
        if (isset($soxId) && $soxId != "-1") {

            $oArticle->load($soxId);
            $this->_aViewData["oxparentid"] = $oArticle->oxarticles__oxparentid->value;
            
            $this->_aViewData['edit2'] = $oLinkShare = oxNew(\rs\linkshare\Application\Model\rs_linkshare::class);
            $oLinkShare->load($soxId, 'article');
            $oLinkShare->loadTypeInLang($this->_iEditLang, $soxId, 'article');
        }

        return $this->_sThisTemplate;
    }
    
    
    
    public function save()
    {
        parent::save();

        $soxId = $this->getEditObjectId();
        $aParams = \OxidEsales\Eshop\Core\Registry::getConfig()->getRequestParameter("editval");

        $oLinkShare = oxNew(\rs\linkshare\Application\Model\rs_linkshare::class);
        $oLinkShare->loadInLang($this->_iEditLang, $soxId);

        $oLinkShare->setLanguage(0);
        $oLinkShare->assign($aParams);
        $oLinkShare->setLanguage($this->_iEditLang);

        $oLinkShare->save();
        
        //upload file
        $oLinkShare->uploadPicture();
    }
    
    public function deletePicture()
    {
        $soxId = $this->getEditObjectId();
        
        $oLinkShare = oxNew(\rs\linkshare\Application\Model\rs_linkshare::class);
        $oLinkShare->loadInLang($this->_iEditLang, $soxId);
        
        $oLinkShare->deletePicture();
    }
}
