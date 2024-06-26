# Sleeky Starter Theme

## Changelog
### Version 1.0

  Initional versioning of the starter template.

  - Updates
    - Updated to jQuery version 3.7.1 ( previously 3.6.0 )
    - Updated to jQuery Migrate 3.4.1 ( previously 3.4.0 )
    - Updated to latest slick.js version 1.9.0
    - Readded animate.css file and updated to 4.1.1 ( previously 3.5.1 )
    - Readded wowjs.js file and updated to 1.3.0 ( previously 1.1.3 )
    - Added featherlight.js

  - General
    - Removed category.php, front-page.php, page.php, index.php, single.php as in many cases they are not used, and we can create them when needed, makes it easier to track active theme files.
    - Removed the functionality for comments as this is not used in most cases. To remove, comment out the code in the core.php. Under "Remove comments by default".
    - Fixed an issue with block crashing due to slick slider item being removed in the back end. In the block.json, under "supports", jsx needs to be set to false.

  - Functions
    - Added a function that estimates the read time of passed text. Usage: site_estimated_reading_time( $content ); which returns time in minutes.

  - Blocks
    - Blocks styles/scripts are now loaded only if the block is in use. This is important to note, as if the block contains "general" rules, they will not be loaded. For "general" stylesheet use the default style.css file. ( buttons/headings and repeated rules you want to reuse, this is also loaded in back end editor )
    - Blocks are no longer registered in blocks.php, and are now self contained in a folder.
    - Blocks are now located under filepath "blocks", with each block information contained in the folder with its name. For the example, if we will have a block called Frequently Asked Questions, we would name the folder "frequently-asked-questions".
    - Each block now has their own style, script and php file that can be used ( php file is used if there is php code that powers the block or if the block uses scripts so it can include it ) otherwise not needed.
    - Files need to have specific names Block registration ( block.json), PHP ( init.php ), Visual ( html that renders for users ) ( render.php ), Script ( script.js ), style ( style.css ).