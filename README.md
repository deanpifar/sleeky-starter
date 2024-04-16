# Sleeky Starter Theme

## Changelog
### Version 1.0

  Initional versioning of the starter template.

  - Blocks
    - Blocks are no longer registered in blocks.php, and are now self contained in a folder.
    - Blocks are now located under filepath "blocks", with each block information contained in the folder with its name. For the example, if we will have a block called Frequently Asked Questions, we would name the folder "frequently-asked-questions".
    - Each block now has their own style, script and php file that can be used ( php file is used if there is php code that powers the block or if the block uses scripts so it can include it ) otherwise not needed.
    - Files need to have specific names Block registration ( block.json), PHP ( init.php ), Visual ( html that renders for users ) ( render.php ), Script ( script.js ), style ( style.css ).