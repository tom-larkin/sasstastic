# sasstastic
A modular, lightweight, and unopinionated Sass framework. Created for Wordpress, but extendable to any stack

This project aims to make Sass as modular as possible, and also make it easy to use with Wordpress. Simply add your child-theme header to the main style.scss file. Once your sass is compiled it will overwrite the child-theme's css file. 

Version: 0.0.1
Author: Thomas Larkin
Website:  https://specialops.io






----------GLOSSARY----------

_toc.scss -> Table of contents file. These files are used solely to run @imports for all partials within it's directory. To add a partial, you will only need to update the deepest *-toc, as all *-toc files are linked to their parents all the way to the main style.scss. 

_sandbox.scss -> A temporary testing ground to ensure a style plays nice with the rest of the document. Once the rule is finalized, transfer the sandbox style to it's own partial. REMEMEBER to @import that partial with in the directory's toc file.

_style.scss -> Finalized styles for the element, variables, mixins, etc. 

