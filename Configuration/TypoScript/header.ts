lib.header = COA
lib.header {
  10 = HTML
  10.value(
  
  <div style="float:right; width:160px;">
    <a href="/"><img id="logo" src="fileadmin/images/StudiensammlungKern.png" style="margin:-10px 3px 0px 0px;float:right;"/></a>
  </div>
  <div style="width:810px;>
      <a href="/">
        <img src="fileadmin/images/Kern1894.png" style="margin:5px 0px 0px 22px;float:left;" width="132" height="50" /></a>
    <div style="margin-left:230px;">
      <h1>Kern &amp; Co. AG</h1>
      <p style="margin:0 0 6px;">Werke für Präzisionsmechanik, Optik und Elektronik<br>1819 bis 1991</p>
    </div>
    <div>
      <a href="http://www.museumaarau.ch/" target="_blank">
        <img src="fileadmin/images/Stadtmuseum.png" style="margin:5px 0px 0px 22px;float:left;" width="132" height="53" /></a>
      <div style="margin-left:230px;">
        <h1>Studiensammlung</h1>
        <p style="margin:0 0 6px;">im STADTMUSEUM AARAU</p>
      </div>
    </div>
  </div>
)
}
[globalVar = IENV:HTTP_HOST = ka.thomasnu.ch]
lib.header.10.value := replaceString(Co. AG|Co. AG <span class="red">[Entwicklerkopie thomasNu]</span>)
[end]

# Create the footer
temp.pageUpdated = COA
temp.pageUpdated {
  10 = TEXT
  10.data = page:lastUpdated // page:SYS_LASTCHANGED
  10.strftime = %e. %B %Y
  10.innerWrap = Aktualisiert am&nbsp; | &nbsp;&uarr;                                                
  10.typolink.addQueryString = 1
  10.typolink.parameter = #top
  10.typolink.title = Zum Seitenanfang
  10.wrap = <div class="footer-totop"> | </div>
  }
temp.homeUpdated = COA
temp.homeUpdated {
  10 = HMENU
  10.special = updated
  10.special {
    value = 2,3,22
    beginAtLevel = 1
    mode = lastUpdated
    depth = 2
    maxAge = 3600*24*730
    limit = 1
    excludeNoSearchPages = 1
  }  
  10.1 = TMENU
  10.1.NO {
    after.cObject = TEXT
    after.cObject {
      field = lastUpdated
      strftime = Aktuell:&nbsp;%d.%m.%Y&nbsp;&uarr;
      typolink.parameter = #top
      typolink.title = Zum Seitenanfang
      }
    afterWrap = |
    linkWrap = |&nbsp;-&nbsp;
    }
  10.wrap = <div class="footer-totop"> | </div>
  }
lib.footer = COA
lib.footer {
  10 < temp.pageUpdated
  20 = TEXT
  20 < styles.content.getBorder
  20.select.pidInList = 46
}
[PIDinRootline = 14,35,116]
lib.tableUpdated = TEXT
lib.tableUpdated {
  current = 1
  innerWrap = Aktualisiert am&nbsp; | &nbsp;&uarr;                                                
  typolink.addQueryString = 1
  typolink.addQueryString.exclude = cHash
  typolink.parameter = #top
  typolink.title = Zum Seitenanfang
  }
lib.footer.10.wrap = <div id="footer-updated" class="footer-totop"><b>|</b></div>
[end]
[PIDinRootline = 17]
lib.footer.10 < temp.homeUpdated
[end]
