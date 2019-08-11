- Information
Theme: Enfold Child (SpecialOPS FORK)
Description: This fork of the enfold-child theme which adds Sass support, current VSCode workspace, and resources about the project. 
Version: 0.0.1
Author: Thomas Larkin
Website:  https://specialops.io

- Resources
Theme Documentation: https://kriesi.at/documentation/enfold/
Sass Documentation: https://sass-lang.com/documentation

- Pockets
html
css
sass
js
wp
design
general


- Document Map / Info


----------GLOSSARY----------

*-toc -> Table of contents file. These files are used solely to run @imports for all partials within it's directory. To add a partial, you will only need to update the deepest *-toc, as all *-toc files are linked to their parents all the way to the main style.scss. 

*.-sandbox -> A temporary testing ground to ensure a style plays nice with the rest of the document. Once the rule is finalized, transfer the sandbox style to it's own partial. REMEMEBER to @import that partial with in the directory's *-toc file.

----------------------------



    +---components -> Reusable elements 
    |   +---buttons
    |   |   \---individuals
    |   +---containers
    |   |   \---individuals
    |   +---forms
    |   |   \---individuals
    |   +---lists
    |   |   \---individuals
    |   \---tables
    |       \---individuals
    +---external -> Styles from third party sites. 
    +---globals  -> Rules that affect the entire site
    |   +---layout
    |   |   \---individuals
    |   \---typography
    |       \---individuals
    +---sections -> Styles that only effect individual areas of the site
    |   +---body
    |   +---footer
    |   +---header
    |   +---nav
    |   +---sidebar
    |   \---socket
    +---utilities -> Timesaving awesomeness
    |   +---animations
    |   +---functions
    |   +---maps
    |   +---mixins
    |   +---placeholders
    |   \---variables
    \---wp -> Some wordpress exclusive styles
        +---admin -> want to make /wp-admin snazzy? Do it here!
        |   +---dashboard
        |   +---login
        |   +---menu-bar
        |   \---sidebar
        +---archives -> These styles only affect archives of posts
        |   +---all
        |   \---type
        +---pages -> Styles created in this directory should only affect all or specific pages, not posts.
        |   +---all
        |   +---home
        |   \---individuals
        +---posts -> Same as pages, but with posts ;)
        |   +---all
        |   +---custom
        |   \---individuals
        \---taxonomies -> Make all or individual categories look funky 
        |   +---all
        |   \---custom
        \---woocommerce -> Targets the ecommerce plugin, woocommerce's pages and elements
            +---cart
            +---checkout
            +---products
            |   +---all
            |   +---categories
            |   \---individuals
            \---store


