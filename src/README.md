
## TODO
* Add metadata support https://github.com/pagerange/metaparsedown
    * Support name & page title, tags, date edited, etc.
    * support lookup by tag
* support for search
* make public
* remove English

## Possible future enhancements
* caching
* editing
* PDO interface
* maybe 

# About this site

Some inspiration from 10Kb club https://10kbclub.com/ - I love this kind of stuff. 

Some inspiration from server installation issues with a ruby-based system and its sheer size and the complexity of the underlying systems that were needed. This has very little code and basing it on php only makes it easy to install anywhere.

This site uses [Parsedown](https://github.com/erusev/parsedown) to render flat markdown files into html. It has some basic css that is minified with [matthiasmullie/minify](https://github.com/matthiasmullie/minify). I just wanted create a fast, super-simple website generator while I was watching football. It's basically a wiki without the editing. In the future I may add editing, caching, file metadata, and a PDO interface to grab content from a database. For now it's simple enough to just upload markdown files.

There's no js and the css is just enough to make it a little responsive.
