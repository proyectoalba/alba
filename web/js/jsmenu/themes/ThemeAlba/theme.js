
// directory of where all the images are
var cmThemeAlbaBase = '/~heng/JSCookMenu/ThemeAlba/';

// the follow block allows user to re-define theme base directory
// before it is loaded.
try
{
	if (myThemeAlbaBase)
	{
		cmThemeAlbaBase = myThemeAlbaBase;
	}
}
catch (e)
{
}

var cmThemeAlba =
{
  	// main menu display attributes
  	//
  	// Note.  When the menu bar is horizontal,
  	// mainFolderLeft and mainFolderRight are
  	// put in <span></span>.  When the menu
  	// bar is vertical, they would be put in
  	// a separate TD cell.

  	// HTML code to the left of the folder item
  	mainFolderLeft: '&nbsp;',
  	// HTML code to the right of the folder item
  	mainFolderRight: '&nbsp;',
	// HTML code to the left of the regular item
	mainItemLeft: '&nbsp;',
	// HTML code to the right of the regular item
	mainItemRight: '&nbsp;',

	// sub menu display attributes

	// 0, HTML code to the left of the folder item
	folderLeft: '<img alt="" src="' + cmThemeAlbaBase + 'spacer.gif">',
	// 1, HTML code to the right of the folder item
	folderRight: '<img alt="" src="' + cmThemeAlbaBase + 'arrow.gif">',
	// 2, HTML code to the left of the regular item
	itemLeft: '<img alt="" src="' + cmThemeAlbaBase + 'spacer.gif">',
	// 3, HTML code to the right of the regular item
	itemRight: '<img alt="" src="' + cmThemeAlbaBase + 'blank.gif">',
	// 4, cell spacing for main menu
	mainSpacing: 0,
	// 5, cell spacing for sub menus
	subSpacing: 0,
	// 6, auto dispear time for submenus in milli-seconds
	delay: 500
};

// for horizontal menu split
var cmThemeAlbaHSplit = [_cmNoClick, '<td class="ThemeAlbaMenuItemLeft"></td><td colspan="2"><div class="ThemeAlbaMenuSplit"></div></td>'];
var cmThemeAlbaMainHSplit = [_cmNoClick, '<td class="ThemeAlbaMainItemLeft"></td><td colspan="2"><div class="ThemeAlbaMenuSplit"></div></td>'];
var cmThemeAlbaMainVSplit = [_cmNoClick, '|'];
