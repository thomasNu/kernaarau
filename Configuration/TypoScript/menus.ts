temp.topmenu = HMENU
temp.topmenu {
  special = directory
  special.value = 2
  wrap = <ul>|</ul>
  1 = TMENU
  1 {
    expAll = 1
    NO.wrapItemAndSub = <li>|</li>
    ACT = 1
    ACT.wrapItemAndSub = <li class="active">|</li>
  }
  2 = TMENU
  2 {
    wrap = <ul>|</ul>
    NO.linkWrap = <li>|</li>
    ACT = 1
    ACT.linkWrap = <li class="active">|</li>
  }
}
temp.tools = COA
temp.tools {
  15 = IMAGE
  15.file = EXT:kernaarau/Resources/Public/Icons/facebook.gif
  15.altText = Facebook
  15.titleText = Facebook
  15.stdWrap.typolink {
    parameter = 136
    ATagParams = name="top" 
    }
  25 = IMAGE
  25.file = EXT:kernaarau/Resources/Public/Icons/print.gif
  25.altText = Druckerfreundlich
  25.titleText = Druckerfreundlich
  25.stdWrap.typolink {
    parameter = #
    additionalParams = &print=1&no_cache=1
    }
  25.if {
    value = {$content.noPrint}
    isInList.data = page:uid
//    negate = 1
    } 
  wrap = <div class="tools">|</div>
}
lib.topmenuTools = COA
lib.topmenuTools {
  10 < temp.topmenu
  20 < temp.tools
}
temp.lastupdated = HMENU
temp.lastupdated {
  special = updated
  special {
    value = 2,3,22
    beginAtLevel = 1
    mode = lastUpdated
    depth = 2
    maxAge = 3600*24*70
    limit = 8
    excludeNoSearchPages = 1
  }  
  1 = TMENU
  1.wrap = <ul style="display: none;">|</ul>
  1.NO {
    before.cObject = TEXT
    before.cObject {
      field = lastUpdated
      strftime = %d.%m.
    }
    beforeWrap = <li style="margin-left: -9px; word-spacing: -2px;"><b style="font-size: 9px; color: #800000;"> | </b>
    linkWrap = |</li>
  }
  1.ACT = 1
  1.ACT {
    before.cObject = TEXT
    before.cObject {
      field = lastUpdated
      strftime = %d.%m.
    }
    beforeWrap = <li class="active" style="margin-left: -9px;"><b style="font-size: 9px; color: #800000;"> | </b>
    linkWrap = |</li>
  }
}
temp.directory = HMENU
temp.directory {
  special = directory
  special.value = 3
  1 = TMENU
  1.wrap = <ul>|</ul>
  1.NO {
    linkWrap = <li>|</li>
  }
  1.ACT = 1
  1.ACT.linkWrap = <li class="active">|</li>
}
temp.searchbox = HTML
temp.searchbox {
  value (
  <div>
    <div class="searchbox">
      <script>
        (function() {
          var cx = '009358342286882589810:gpkgvdxc4-c';
          var gcse = document.createElement('script');
          gcse.type = 'text/javascript';
          gcse.async = true;
          gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
            '//www.google.com/cse/cse.js?cx=' + cx;
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(gcse, s);
        })();
      </script>
      <form action="kern-suche/gefunden.html" method="get">
        <input type="text" class="search-text" name="q" value="Suche nach ..." onclick="this.value=''" />
        <input type="image" class="search-image" onclick="this.submit();" src="fileadmin/templates/find.gif" title="Suche [↵]" />
      </form>
    </div>
    <div class="search-product" style="margin-top: 4px;">
      <form action="kern-extern/produkte-von-a-bis-z.html" methode="get">
        <input type="text" class="search-text" name="sw" value="Suche in Produkten ..." onclick="this.value=''" />
        <input type="image" class="search-image" onclick="window.location.href = 'kern-extern/produkte/-feldstecher.html';" src="fileadmin/templates/find.gif" style="vertical-align:bottom;" title="Suche [↵]" />
      </form>
    </div>
  </div>
)  
}
temp.menuitem = COA
temp.menuitem {
  wrap = <div class="menu">|</div>
  10 = HMENU
  10 {
    special = list
    special.value = 3
    1 = TMENU
    1.NO {
      doNotLinkIt = 1
      allWrap = <h2>▾&nbsp;|</h2>
    }
  }  
  20 < temp.directory
}
lib.menuleft = COA
lib.menuleft {
  5 < temp.menuitem
  30 < temp.menuitem
}
lib.menuleft.5.10.special.value = 149
lib.menuleft.5.10.1.NO.allWrap = <h2 style="cursor: s-resize;">▸&nbsp;|</h2>
lib.menuleft.5.20 < temp.lastupdated
lib.menuleft.30.10.special.value = 126
lib.menuleft.30.20 < temp.searchbox

[PIDinRootline = 18,131,152,19,89,20,132]
lib.menuleft.2 < temp.menuitem
lib.menuleft.2.10.special.value.data = fullRootLine:2, uid
lib.menuleft.2.20.special.value.data = fullRootLine:2, uid
lib.menuleft.10 < temp.menuitem
lib.menuleft.20 < temp.menuitem
[GLOBAL][GLOBAL]
[PIDinRootline = 3]
lib.menuleft.2 < temp.menuitem
lib.menuleft.2.10.special.value.data = fullRootLine:1, uid
lib.menuleft.2.20.special.value.data = fullRootLine:1, uid
lib.menuleft.20 < temp.menuitem
[GLOBAL]
[PIDinRootline = 22]
lib.menuleft.2 < temp.menuitem
lib.menuleft.2.10.special.value.data = fullRootLine:1, uid
lib.menuleft.2.20.special.value.data = fullRootLine:1, uid
lib.menuleft.10 < temp.menuitem
[GLOBAL]
[PIDinRootline = 17]
lib.menuleft.5.10.1.NO.allWrap = <h2 class="red">▾&nbsp;|</h2>
lib.menuleft.5.20.1.wrap = <ul>|</ul>
lib.menuleft.10 < temp.menuitem
lib.menuleft.20 < temp.menuitem
[GLOBAL]
[PIDinRootline = 126]
lib.menuleft.3 < temp.menuitem
lib.menuleft.3.10.special.value = 126
lib.menuleft.3.20 < temp.searchbox
lib.menuleft.5.10.1.NO.allWrap = <h2>▾&nbsp;|</h2>
lib.menuleft.5.20.1.wrap = <ul>|</ul>
lib.menuleft.10 < temp.menuitem
lib.menuleft.20 < temp.menuitem
lib.menuleft.30 >
[GLOBAL]
[PIDinRootline = 35]
lib.menuleft.2 >
lib.menuleft.3 < temp.menuitem
lib.menuleft.3.10.special.value = 126
lib.menuleft.3.20 < temp.searchbox
lib.menuleft.10 < temp.menuitem
lib.menuleft.20 < temp.menuitem
lib.menuleft.30 >
[GLOBAL]

lib.menuleft.20.10.special.value = 22
lib.menuleft.20.20.special.value = 22
