[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<script type="text/javascript">
<!--
function DeletePic()
{
    var oForm = document.getElementById("myedit");
    oForm.fnc.value="deletePicture";
    oForm.submit();
}
function editThis(sID)
{
    var oTransfer = top.basefrm.edit.document.getElementById( "transfer" );
    oTransfer.oxid.value = sID;
    oTransfer.cl.value = top.basefrm.list.sDefClass;

    //forcing edit frame to reload after submit
    top.forceReloadingEditFrame();

    var oSearch = top.basefrm.list.document.getElementById( "search" );
    oSearch.oxid.value = sID;
    oSearch.actedit.value = 0;
    oSearch.submit();
}
//-->
</script>

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="rs_linkshare_category">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
</form>

<form name="myedit" id="myedit" enctype="multipart/form-data" action="[{$oViewConf->getSelfLink()}]" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="[{$iMaxUploadFileSize}]">
[{$oViewConf->getHiddenSid()}]
<input type="hidden" name="cl" value="rs_linkshare_category">
<input type="hidden" name="fnc" value="">
<input type="hidden" name="oxid" value="[{$oxid}]">
<input type="hidden" name="editval[oxid]" value="[{$oxid}]">
<input type="hidden" name="editval[rstype]" value="category">
<input type="hidden" name="voxid" value="[{$oxid}]">
<input type="hidden" name="oxparentid" value="[{$oxparentid}]">

    <table cellspacing="0" cellpadding="0" width="98%" border="0">
      <tr>
        <td valign="top">
            <table>
                <tr>
                    <td><b>[{$edit->oxcategories__oxtitle->value}]</b></td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td valign="top">Title</td>
                    <td valign="top"><input type="text" name="editval[rstitle]" value="[{$edit2->rs_linkshare__rstitle->value}]"></td>
                    <td valign="top">Should be maximum 35 characters or else will be clipped in the Rich Preview</td>
                </tr>
                <tr>
                    <td valign="top">Description</td>
                    <td valign="top"><input type="text" name="editval[rsdescription]" value="[{$edit2->rs_linkshare__rsdescription->value}]"></td>
                    <td valign="top">Should be maximum 65 characters or else will be clipped in the Rich Preview</td>
                </tr>
                <tr>
                    <td valign="top">Image</td>
                    <td valign="top">
                        [{if $edit2->rs_linkshare__rsimage->value !=""}]
                            <img border="0" src="[{$edit2->getUrlFile()}]" title="[{$edit2->rs_linkshare__rsimage->value}]"><br>
                            <a href="Javascript:DeletePic();" class="deleteText"><span class="ico"></span><span>[{oxmultilang ident="GENERAL_DELETE"}]</span></a>
                        [{else}]
                            <input name="rs_linkshare__rsimage" type="file">
                        [{/if}]
                    </td>
                    <td valign="top">A JPG or PNG image, minimum dimensions of 300 x 200 pixels are advised</td>
                </tr>
            </table>
                
            <input type="submit" class="edittext" name="save" value="[{ oxmultilang ident="ARTICLE_PICTURES_SAVE" }]" onClick="Javascript:document.myedit.fnc.value='save'" [{$readonly}]><br>

        </td>
        <td valign="top">
        </td>
      </tr>
   </table>

</form>

[{include file="bottomnaviitem.tpl"}]
[{include file="bottomitem.tpl"}]