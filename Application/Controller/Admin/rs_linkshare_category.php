<?php
namespace rs\linkshare\Application\Controller\Admin;

use OxidEsales\Eshop\Core\Request;

class rs_linkshare_category extends \OxidEsales\Eshop\Application\Controller\Admin\AdminController{

    protected $_sThisTemplate='rs_linkshare_category.tpl';
    
    public function render()
    {
        parent::render();

        $this->_aViewData['edit'] = $oCategory = oxNew(\OxidEsales\Eshop\Application\Model\Category::class);

        $soxId = $this->_aViewData["oxid"] = $this->getEditObjectId();
        if (isset($soxId) && $soxId != "-1") {
            $oCategory->load($soxId);
          
            $this->_aViewData['edit2'] = $oLinkShare = oxNew(\rs\linkshare\Application\Model\rs_linkshare::class);
            $oLinkShare->loadType($soxId, 'category');
            $oLinkShare->loadTypeInLang($this->_iEditLang, $soxId, 'category');
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
