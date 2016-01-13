config {
  doctype = xhtml_trans
  xhtml_cleaning = all
  xmlprologue = none
  removeDefaultJS = 1
  removeDefaultJS = external
  disablePrefixComment = 1
  tx_realurl_enable = 1
  baseURL = http://www.kern-aarau.ch/
}

config.sys_language_uid = 0
config.language = de
config.locale_all = de_DE.UTF8
  
config.spamProtectEmailAddresses = 2
config.spamProtectEmailAddresses_atSubst = (at)

page = PAGE
page.typeNum = 0
page.meta.robots=index,follow

config.noPageTitle = 1
page {
  headerData {
    10 = TEXT
    10 {
      field = title
      noTrimWrap = |<title>| - |
      htmlSpecialChars = 1
      stdWrap.split {
        token = ►
        returnKey = 0
      }
    }
    11 = TEXT
    11 {
      value = Kern Aarau
      wrap = |</title>
    }
  }
  shortcutIcon = fileadmin/templates/favicon5.ico
}
[PIDinRootline = 17,21,90]
page.includeJS {
    file1 = fileadmin/js/jquery-1.5.min.js
    file2 = fileadmin/js/nivo-slider/jquery.nivo.slider.pack.js
    file3 = fileadmin/js/lightbox/jquery.lightbox-0.5.pack.js
    file4 = EXT:kernaarau/Resources/Public/Javascript/jquery.js
    file5 = fileadmin/templates/analytics.js
}
[else]
page.includeJS.file5 = fileadmin/templates/analytics.js
page.includeJSFooter {
    file1 = fileadmin/js/jquery-1.5.min.js
    file2 = fileadmin/js/nivo-slider/jquery.nivo.slider.pack.js
    file3 = fileadmin/js/lightbox/jquery.lightbox-0.5.pack.js
    file4 = EXT:kernaarau/Resources/Public/Javascript/jquery.js
}
[end]
[globalVar = IENV:HTTP_HOST = ka.thomasnu.ch]
config.baseURL = http://ka.thomasnu.ch/
page.meta.robots = noindex, nofollow
page.headerData.11.value >
page.headerData.11.data = getenv:REMOTE_ADDR
[end]
[globalVar = IENV:HTTP_HOST = ka62.thomasnu.ch]
config.baseURL = http://ka62.thomasnu.ch/
page.meta.robots = noindex, nofollow
page.headerData.11.value = 4.5 > 6.2
[end]

// tt_content.stdWrap.innerWrap >
tt_content.image.20.default.maxW = 400
tt_content.image.20.default.maxWInText = 200

page.includeCSS {
  basics = EXT:kernaarau/Resources/Public/Stylesheet/basics.css
  file2 = fileadmin/js/nivo-slider/nivo-slider.css
  design = EXT:kernaarau/Resources/Public/Stylesheet/design.css
  content = EXT:kernaarau/Resources/Public/Stylesheet/content.css
}

temp.mainTemplate = TEMPLATE
temp.mainTemplate {
  template = FILE
  template.file = fileadmin/templates/main.html
  subparts {  
    HEADER < lib.header
    GALLERY < lib.gallery
    TOPMENU < lib.topmenuTools
    MENULEFT < lib.menuleft
    CONTENT < styles.content.get
    FOOTER < lib.footer
  }
}

# Create a Fluid Template
temp.fluidTemplate = FLUIDTEMPLATE
temp.fluidTemplate {
    # Set the Template Pathes
    partialRootPath = EXT:kernaarau/Resources/Private/Partials/
    layoutRootPath = EXT:kernaarau/Resources/Private/Layouts/
    variables {
        # Assign the main column with our {content}-destination
        content < styles.content.get
        # Assign the margin column with our {margin}-destination
        margin < styles.content.get
        margin.select.where = colPos = 2
    }
    # Assign the Template files with the Fluid Backend-Template
    file.stdWrap.cObject = CASE
    file.stdWrap.cObject {
        key.data = levelfield:-1, backend_layout_next_level, slide
        key.override.field = backend_layout
        # Set the default Template
        default = TEXT
        default.value = EXT:kernaarau/Resources/Private/Templates/Content/Middle.html
        # Set also the first [1] Template
        1.value = EXT:kernaarau/Resources/Private/Templates/Content/Middle.html
        # Set a second [2] Template
        2 = TEXT
        2.value = EXT:kernaarau/Resources/Private/Templates/Content/Columns.html
    }
}
[globalVar = GP:print > 0]
temp.fluidTemplate.file.stdWrap.cObject {
    default.value = EXT:kernaarau/Resources/Private/Templates/Content/Print.html
    1.value = EXT:kernaarau/Resources/Private/Templates/Content/Print.html
}
[end]
page.10 < temp.fluidTemplate
