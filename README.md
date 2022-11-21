# Current status
* generally working, installing a root directory from git is kinda weird - needs to be a composer package
* want to do some cleanup, add copyright notices and documentation

## Possible future enhancements
* caching
* editing
* PDO interface
* Obsidian markdown support

# About this site

Some inspiration from 10Kb club https://10kbclub.com/ - I love this kind of stuff. Using this system keeps me well under that.

Some inspiration from server installation issues with a ruby-based system and its sheer size and the complexity of the underlying systems that were needed. This has very little code and it's intentionally very simple. Making it php-only means it is easy to install anywhere.

This site uses [Parsedown](https://github.com/erusev/parsedown) and [pagerange/metaparsedown](https://github.com/pagerange/metaparsedown) to render flat markdown files into html. It has some basic css that is minified with [matthiasmullie/minify](https://github.com/matthiasmullie/minify). I just wanted create a fast, super-simple website generator while I was watching football. It's basically a wiki without the editing. In the future I may add editing, caching, file metadata, and a PDO interface to grab content from a database. For now it's simple enough to just upload markdown files.

There's no js and the css is just enough to make it a little responsive.
