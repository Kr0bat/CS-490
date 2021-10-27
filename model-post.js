
class Post {

    constructor(
        username = "USERNAME",
        isAdmin = false,
        user_first_name = "FIRST",
        user_last_name = "LAST",
        user_pfp_link = "https://web.njit.edu/~kg448/assets/default-profile.png",
        post_title = "DEFAULT TITLE",
        post_description = "DEFAULT DESCRIPTION",
        post_id = 0,
        song_album_art = "https://web.njit.edu/~kg448/assets/logo_spotify.png",
        song_title = "SONG TITLE",
        song_album = "SONG ALBUM",
        song_year = "SONG YEAR",
        song_artist = "SONG ARTIST",
        song_link = "https://google.com") {

        // MAIN STRUCTURE:
        this.containerDiv = $('<div>')
            .addClass('col-12 bodyBold postContainer')
            .id(this.options.post_id)
            .css({
                'margin': '0',
            })

        this.innerDiv = ('<div>')
            .addClass('col-12')
            .appendTo(this.containerDiv)

        this.topTable = ('<table>')
            .css({
                'margin': '0',
            })
            .appendTo(this.innerDiv)

        this.botTable = ('<table>')
            .css({
                'margin': '0',
                'width': '100%'
            })
            .appendTo(this.innerDiv)

        this.topTableBody = ('<tbody>')
            .appendTo(this.topTable)

        this.botTableBody = ('<tbody>')
            .appendTo(this.botTable)

        this.topTr = ('<tr>')
            .appendTo(this.topTableBody)

        this.botTr = ('<tr>')
            .appendTo(this.botTableBody)

        this.leftTd = ('<td>')
            .appendTo(this.topTr)

        this.rightTd = ('<td>')
            .css({
                'text-align': 'right',
                'width': '100%'
            })
            .appendTo(this.topTr)




        // CREATOR NAME AND PROFILE PIC STRUCTURE:
        this.creatorTable = ('<table>')
            .addClass('bodyLight')
            .appendTo(this.leftTd)

        this.creatorTableBody = ('<tbody>')
            .appendTo(this.creatorTable)

        this.creatorTr = ('<tr>')
            .appendTo(this.creatorTableBody)

        this.creatorPfpTd = ('<td>')
            .css({
                'max-width': 'fit-content',
            })
            .appendTo(this.creatorTr)

        this.creatorNameTd = ('<td>')
            .css({
                'padding-left': '0.5ch',
                'overflow': 'visible',
                'white-space': 'nowrap'
            })
            .appendTo(this.creatorTr)




        // CREATOR'S PIC:
        this.creatorPfp = ('<img>')
            .addClass('logoImg')
            .src(this.options.user_pfp_link)
            .css({
                'border-width': '0.05px',
                'border-radius': '100%',
                'height': '2.5ch',
                'width': '2.5ch',
                'border-style': 'solid',
                'border-color': 'rgba(255, 255, 255, 0.15)',
                'margin-top': '0.4ch'
            })

        this.pfpHolder = ('<span>')
            .append(this.creatorPfp)
        
        profileURL = "/~kg448/account.php?viewing=" + this.options.username + "&redirectFrom=feed";

        this.accountLink = ('<a>')
            .href(profileURL)
            .title("View " + this.options.username + "'s Profile")
            .addClass('bodyLight')
            .css({
                'text-decoration': 'none',
            })
            .append(this.pfpHolder)
            .appendTo(this.creatorPfpTd)




        // CREATOR'S NAME:
        this.accountLinkName = ('<a>')
            .href(profileURL)
            .title("View " + this.options.username + "'s Profile")
            .addClass('bodyLight underlineOnHover')
            .css({
                'text-decoration': 'none',
            })
            .html(this.options.user_first_name + ' ' + this.options.user_last_name)
            
        if (this.options.isAdmin) {
            this.adminSpan = ('<span>')
                .addClass('subtitleLight')
                .css({
                    'font-size': '18px',
                    'color': 'rgb(144, 85, 54)',
                    'padding-left': '5px'
                })
                .html('Admin')
                .appendTo(this.accountLinkName)
        }

        this.nameDiv = ('<div>')
            .addClass('col-12')
            .append(this.accountLinkName)
            .appendTo(this.creatorNameTd)




        // GO TO SONG LINK:
        this.songLinkDiv = ('<div>')
            .addClass('subtitleLight')
            .css({
                'position': 'relative',
                'font-size': '20px',
                'margin-top': '0.2ch',
                'text-decoration': 'none'
            })
            .appendTo(this.rightTd)

        this.songLink = ('<a>')
            .href(this.options.song_link)
            .title("Open link to " + this.options.song_title)
            .html("Go to " + this.options.song_title + " ↗")
            .addClass('subtitleLight')
            .css({
                'text-decoration': 'none',
                'font-size': '20px'
            })
            .appendTo(this.songLinkDiv)




        // ALBUM COVER:
        this.albumImg = ('<img>')
            .addClass('logoImg')
            .src(this.options.song_album_art)
            .css({
                'border-width': '0.05px',
                'border-radius': '0.35ch',
                'height': '15ch',
                'border-style': 'solid',
                'border-color': 'rgba(255, 255, 255, 0.15)',
                'margin-top': '0.4ch'
            })

        this.albumHolder = ('<span>')
            .append(this.albumImg)

        this.albumTd = ('<td>')
            .css({
                'max-width': 'fit-content'
            })
            .append(this.albumHolder)
            .appendTo(this.botTr)




        // POST CONTENT LAYOUT:
        this.contentTd = ('<td>')
            .css({
                'padding-left': '1.69ch',
                'vertical-align': 'top',
                'height': '15ch',
                'width': '100%'
            })
            .appendTo(this.botTr)
        
        this.postContentSection = ('<div>')
            .addClass('col-12')
            .css({
                'height': '7.5ch',
                'overflow': 'hidden',
                'text-overflow': 'ellipsis',
                'word-break': 'break-word'
            })
            .appendTo(this.contentTd)
        
        this.songContentSection = ('<div>')
            .addClass('col-6')
            .css({
                'height': '8ch',
                'overflow': 'hidden',
                'text-overflow': 'ellipsis',
                'word-break': 'break-word',
                'padding-top': '2.65ch'
            })
            .appendTo(this.contentTd)
        
        this.buttonSection = ('<div>')
            .addClass('col-6')
            .css({
                'height': '8ch',
                'overflow': 'hidden',
                'text-overflow': 'ellipsis',
                'word-break': 'break-word',
                'padding-top': '5ch',
                'text-align': 'right'
            })
            .appendTo(this.contentTd)




        // POST CONTENT TOP SECTION:
        this.postTitle = ('<div>')
            .addClass('col-12')
            .css({
                'margin-top': '0.5ch'
            })
            .html(this.options.post_title)
            .appendTo(this.postContentSection)

        this.postDescription = ('<div>')
            .addClass('col-12 subtitleLight')
            .css({
                'margin-top': '0.5ch',
                'font-size': '18px',
                'text-overflow': 'ellipsis',
                'overflow': 'hidden'
            })
            .html(this.options.post_description)
            .appendTo(this.postContentSection)




        // SONG CONTENT BOTTOM LEFT SECTION:
        this.songTitle = ('<div>')
            .addClass('col-12')
            .css({
                'margin-top': '0ch',
                'vertical-align': 'bottom',
                'font-weight': 'normal'
            })
            .html(this.options.song_title)
            .appendTo(this.songContentSection)
        
        this.songDescription = ('<div>')
            .addClass('col-12 subtitleLight')
            .css({
                'font-size': '18px',
                'margin-top': '0.5ch',
                'text-overflow': 'ellipsis',
                'overflow': 'hidden',
                'font-weight': 'normal'
            })
            .html(this.options.song_album + ' - ' + this.options.song_year)
            .appendTo(this.songContentSection)
        
        this.songArtist = ('<div>')
            .addClass('col-12 subtitleLight')
            .css({
                'font-size': '18px',
                'margin-top': '0.5ch',
                'text-overflow': 'ellipsis',
                'overflow': 'hidden'
            })
            .html(this.options.song_artist)
            .appendTo(this.songContentSection)




        // COMMENT AND LIKE BUTTONS (RIGHT BOTTOM SECTION):
        this.commentButton = ('<img>')
            .src('assets/comment.png')
            .addClass('commentButton')
            .css({
                'border-width': '0',
                'height': '3ch',
                'margin-top': '0',
                'cursor': 'pointer'
            })

        this.likeButton = ('<img>')
            .src('assets/heart-off.png')
            .addClass('likeButton')
            .css({
                'border-width': '0',
                'height': '3ch',
                'margin-left': '0.75ch',
                'cursor': 'pointer'
            })
        
        this.buttonDiv = ('<div>')
            .addClass('col-12')
            .append(this.commentButton)
            .append(this.likeButton)
            .appendTo(this.buttonSection)

        this.el
            .append(this.containerDiv)

        return this.el

    }

}