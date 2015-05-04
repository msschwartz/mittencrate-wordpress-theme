
(function($) {
  
  var blogTiles = {};
  
  blogTiles.isLoading = false;
  blogTiles.noMorePosts = false;
  blogTiles.paged = 1;
  blogTiles.posts_per_page = 10;
  
  blogTiles.container = null;
  
  blogTiles.loadingElement = null;
  
  blogTiles.numColumns = null;
  
  blogTiles.posts = null;
  
  blogTiles.column1 = null;
  blogTiles.column2 = null; // > 516px
  blogTiles.column3 = null; // > 816px
  blogTiles.column4 = null; // > 1206px
  blogTiles.column5 = null; // > 1581px
  
  
  blogTiles.template = ""
    + "<div class='blog-tile'>"
    + "  <a class='thumb' href='{{url}}'>"
    + "    <img src='{{image_url}}' />"
    + "    <div class='eye-overlay'></div>"
    + "  </a>"
    + "  <div class='title'>"
    + "    <a href='{{url}}'>{{title}}</a>"
    + "  </div>"
    + "  <div class='meta'>"
    + "    <span class='date'><i class='fa fa-clock-o'></i>{{date}}</span>"
    + "    <span class='views'><i class='fa fa-eye'></i>{{views}}</span>"
    + "  </div>"
    + "</div>";
    
  
  // This redraws entire tile set. It should only be called when initalizing
  // or if the column count changes.
  blogTiles.redraw = function() {    
    this.column1.html('');
    this.column2.html('');
    this.column3.html('');
    this.column4.html('');
    this.column5.html('');
    
    for(var i = 0; i < this.posts.length; i++) {
      this.appendPost(this.posts[i]);
    }
  };
  
  
  blogTiles.addPost = function( post ) {
    this.posts.push(post);
    this.appendPost(post);
  };
  
  
  blogTiles.appendPost = function(post) {
    var newTileHtml = this.template;
    newTileHtml = newTileHtml.replace(/\{\{url\}\}/g, post.url);
    newTileHtml = newTileHtml.replace(/\{\{title\}\}/g, post.title);
    newTileHtml = newTileHtml.replace(/\{\{date\}\}/g, post.date);
    newTileHtml = newTileHtml.replace(/\{\{image_url\}\}/g, post.image_url);
    newTileHtml = newTileHtml.replace(/\{\{views\}\}/g, post.views);
    
    // column 1
    var columnToAppendTo = this.column1;
    
    // column 2
    if (this.numColumns >= 2 && this.column2.height() < columnToAppendTo.height()) {
      columnToAppendTo = this.column2;
    }
    
    // column 3
    if (this.numColumns >= 3 && this.column3.height() < columnToAppendTo.height()) {
      columnToAppendTo = this.column3;
    }
    
    // column 4
    if (this.numColumns >= 4 && this.column4.height() < columnToAppendTo.height()) {
      columnToAppendTo = this.column4;
    }
    
    // column 5
    if (this.numColumns >= 5 && this.column5.height() < columnToAppendTo.height()) {
      columnToAppendTo = this.column5;
    }
    
    columnToAppendTo.append( newTileHtml );
  };
  
  
  blogTiles.onWindowResize = function(e) {
    var oldNumColumns = this.numColumns;
    this.numColumns = this.visibleColumnsCount();
    if (this.numColumns != oldNumColumns) {
      this.redraw();
    }
  };
  
  
  blogTiles.onWindowScroll = function(e) {
    if (this.isLoading || this.noMorePosts) return;
    
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = this.loadingElement.offset().top;
    var elemBottom = elemTop + this.loadingElement.height();

    if ((elemBottom <= docViewBottom) && (elemTop >= docViewTop)) {
      this.grabMorePosts();
    }
  };
  
  
  blogTiles.grabMorePosts = function() {
    if (this.isLoading || this.noMorePosts) return;
    
    this.isLoading = true;
    
    var data = {
      'action': 'ajax_get_posts_action',
      'paged': this.paged,
      'posts_per_page': this.posts_per_page
    };
    
    $.post(admin_ajax_url, data, $.proxy( this.handleAjaxResponse, this ));
  };
  
  
  blogTiles.handleAjaxResponse = function(posts) {
    this.paged++;
    this.isLoading = false;
    
    if (posts == "0" || posts.length < 1) {
      this.noMorePosts = true;
      this.loadingElement.hide();
    }
    else {
      for (var i = 0; i < posts.length; i++) {
        this.addPost(posts[i]);
      };
    }
  };
  
  
  // Returns the number of columns that are currently visible (display = block)
  blogTiles.visibleColumnsCount = function() {
    var count = 1;
    if ( this.column2.css('display') == 'block' ) count++;
    if ( this.column3.css('display') == 'block' ) count++;
    if ( this.column4.css('display') == 'block' ) count++;
    if ( this.column5.css('display') == 'block' ) count++;
    return count;
  };
  
  
  // Initialize the blog tiles
  blogTiles.init = function() {
    
    this.container = $('#blog-tiles');
    
    this.column1 = $('#blog-tiles-column-1');
    this.column2 = $('#blog-tiles-column-2');
    this.column3 = $('#blog-tiles-column-3');
    this.column4 = $('#blog-tiles-column-4');
    this.column5 = $('#blog-tiles-column-5');
    
    this.loadingElement = $('#blog-loading');
    
    this.posts = new Array();
    
    this.numColumns = this.visibleColumnsCount();
    
    $(window).on('resize', $.proxy( this.onWindowResize, this ));
    $(window).on('scroll', $.proxy( this.onWindowScroll, this ));
    
    this.grabMorePosts();
  };



  // Wait for the ready event to initialize the blog tiles
  $(function() {
    if ($('#blog-tiles').size() > 0) {
      blogTiles.init();
    }
  });
  
})(jQuery);
