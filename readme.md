### Toolbox Starter Plugin

Starter plugin for Twig based Beaver Builder plugin development. Create plugins that can use an infinite number of Alias Modules for Toolbox's Timber Posts Module with settings.

#### Prevent users/yourself from deleting your twig powered modules
You can write a complex Twig template in the Timber Posts Module, but if this has taken you a lot of time, you are probably anxious to lose it. You can move it to - and import it from - the Twig Templates CPT, so you can safely edit it as a text-file and still access the builder when it's getting more complex.
A third option is to wrap re-usable Twig Templates in a plugin for easier distribution.

This plugin shows you the basics of

 - Adding the plugin's Twig-directory to the array of directory Twig is going to look for twig-files
 - Registering Alias Modules for the Timber Posts Modules
 - Create Settings-Form to allow optional settings for your Alias Modules, adding a familiar interface for additional module settings.
 - Using the \_\_node\_\_ settings to control the output of the Alias Module with a default value.

 #### releases

1.1  updated readme.md file, added code comments.

1.0  initial release