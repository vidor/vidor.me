/**
 * @preserve Galleria Classic Theme 2011-08-01
 * http://galleria.aino.se
 *
 * Copyright (c) 2011, Aino
 * Licensed under the MIT license.
 */

/*global jQuery, Galleria */

Galleria.requires(1.25, 'This version of Classic theme requires Galleria 1.2.5 or later');

(function($) {

Galleria.addTheme({
    name: 'vidor',
    author: 'vidor',
    css: 'galleria.vidor.css',
    defaults: {
        transition: 'slide',
        thumbCrop:  'height',

        // set this to false if you want to show the caption all the time:
        _toggleInfo: true
    },
    init: function(options) {

        // add some elements
        /*
        this.addElement('info-link','info-close');
        this.append({
            'info' : ['info-link','info-close']
        });
        */
        
        this.addElement('fullscreen-btn');
        this.addElement('play-btn');
        this.addElement('timer');
        this.append({'info' : ['fullscreen-btn', 'play-btn']});

        // cache some stuff
        var info = this.$('info-link,info-close,info-text'),
            touch = Galleria.TOUCH,
            click = touch ? 'touchstart' : 'click';

        // show loader & counter with opacity
        this.$('loader,counter').show().css('opacity', 0.4);

        // some stuff for non-touch browsers
        
        if (! touch) {
            this.addIdleState( this.get('image-nav-left'), { left:-50 });
            this.addIdleState( this.get('image-nav-right'), { right:-50 });
            //this.addIdleState( this.get('counter'), { opacity:0 });
        }

        // toggle info
        /*
        if ( options._toggleInfo === true ) {
            info.bind( click, function() {
                info.toggle();
            });
        } else {
            info.show();
            this.$('info-link, info-close').hide();
        }
        */

        // bind some stuff
        this.bind('thumbnail', function(e) {

            if (! touch ) {
                // fade thumbnails
                $(e.thumbTarget).css('opacity', 0.6).parent().hover(function() {
                    $(this).not('.active').children().stop().fadeTo(100, 1);
                }, function() {
                    $(this).not('.active').children().stop().fadeTo(400, 0.6);
                });

                if ( e.index === this.getIndex() ) {
                    $(e.thumbTarget).css('opacity',1);
                }
            } else {
                $(e.thumbTarget).css('opacity', this.getIndex() ? 1 : 0.6);
            }
        });

        this.bind('loadstart', function(e) {
            if (!e.cached) {
                this.$('loader').show().fadeTo(200, 0.4);
            }

            this.$('info').toggle( this.hasInfo() );

            $(e.thumbTarget).css('opacity',1).parent().siblings().children().css('opacity', 0.6);
        });

        this.bind('loadfinish', function(e) {
            this.$('loader').fadeOut(200);
        });
        
        //for fullscreen
        var that = this;
        var fullscreenActive = false;
        this.$('fullscreen-btn').toggle(function() {
        	that.enterFullscreen();
        	fullscreenActive = true;

        },function() {
            that.exitFullscreen(); 
            fullscreenActive = false;      
        });
        
        this.$('play-btn').toggle(function() {
        	that.play();
        	$(this).addClass('playing');
        }, function() {
        	that.pause();
        	$(this).removeClass('playing');
        });
        
        
       this.$('images').toggle(function() {
        	if(fullscreenActive) {
        		that.$('info').animate({'top': '-44px'});
        		that.$('thumbnails-container').animate({'bottom': '-60px'});
        	}
        }, function() {
        	if(fullscreenActive) {
        		that.$('info').animate({'top': '0'});
        		that.$('thumbnails-container').animate({'bottom': '0'});
        	}
        
        });
        
    }
});

}(jQuery));
