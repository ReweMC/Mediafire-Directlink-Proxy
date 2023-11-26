# Mediafire-Directlink-Proxy
The Filehoster Mediafire offers no real direct-linking. Even with their pro plan you can only enable direct downloading. This is a standalone php script aiming to fix this.
## Usage
Simply deploy this file on a webserver with php. Then if you want to hotlink a file from a free or paid mediafire account, simply use the following link: **`https://path/to/your/mediafire-hotlink.php?file=<The normal Mediafire download link of your file>`**
When hotlinking files, they will behave as if they're retrieved from a static webserver (Images will open, html files will be correctly displayed, but backend scripts like php files will be downloaded).

If you add the additional query parameter **`dl=1`**, any file will be downloaded instead of opened in the browser, similar to Mediafire's premium option.
## How does it work?
To say it simple: this script first gets the source code of the normal Mediafire download page, then isolates the dynamic direct download link that is linked to the big blue download button using regex and then forwards the content from this dynamic link with `file_get_contents()`.
