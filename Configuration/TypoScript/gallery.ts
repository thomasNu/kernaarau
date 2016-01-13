# page.includeJS for jQuery see basic.ts and jquery.js{

page.headerData.15 = TEXT
page.headerData.15.value (
<script type="text/javascript">
  $(function() {
    $('#gallery').nivoSlider({pauseTime:4000});
    $('.middle a.light').lightBox();
  });
</script>
)

lib.gallery = TEXT
lib.gallery.value =

[PIDinRootline = 17]

lib.gallery = COA
lib.gallery {
  wrap = <div class="gallery">|</div>
  10 = CONTENT
  10 {
    wrap = <div id="gallery">|</div>
    table = tt_content
    select {
      selectFields = header, bodytext, image, uid, image_link
      pidInList = 44
    }
    renderObj = IMAGE
    renderObj {
      file.import = uploads/pics/
      file.import.field = image
      file.width = 960c
      file.height= 200c
      titleText {
        if.isTrue.field = bodytext
        field = uid
        wrap = #p|
      }

      imageLinkWrap = 1
      imageLinkWrap {
        enable.field = image_link  
        typolink {
          parameter.field = image_link
          title.field = header
        }
      }
    }
  }
  20 < lib.gallery.10
  20 {
    wrap = |
    renderObj = COA
    renderObj.if.isTrue.field = bodytext
    renderObj.10 = TEXT
    renderObj.10 {
      field = uid
      wrap =  <div id="p|" class="nivo-html-caption">
    }
    renderObj.20 = TEXT
    renderObj.20.field = bodytext
    renderObj.20.parseFunc = < lib.parseFunc_RTE
    renderObj.30 = TEXT
    renderObj.30.value= </div>
  }  
}
[global]