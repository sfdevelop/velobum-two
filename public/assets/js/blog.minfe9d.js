!function(a){"use strict";function b(){f(),g(),h(),i()}function c(){}function d(){}function e(){}function f(){var b=a("audio.edgtf-blog-audio");b.mediaelementplayer({audioWidth:"100%"})}function g(){if(a(".edgtf-blog-holder.edgtf-blog-type-masonry").length){var b=a(".edgtf-blog-holder.edgtf-blog-type-masonry");b.waitForImages({finished:function(){b.isotope({itemSelector:"article",resizable:!1,masonry:{columnWidth:".edgtf-blog-masonry-grid-sizer",gutter:".edgtf-blog-masonry-grid-gutter"}}),setTimeout(function(){b.addClass("edgtf-appeared"),b.isotope("layout")},400)},waitForAll:!0});var c=a(".edgtf-filter-blog-holder");a(".edgtf-filter").click(function(){var d=a(this),e=d.attr("data-filter");return c.find(".edgtf-active").removeClass("edgtf-active"),d.addClass("edgtf-active"),b.isotope({filter:e}),!1})}}function h(){if(a(".edgtf-blog-holder.edgtf-blog-type-masonry").length){var b=a(".edgtf-blog-holder.edgtf-blog-type-masonry");if(b.hasClass("edgtf-masonry-pagination-infinite-scroll")){var c=1;a(".edgtf-blog-infinite-scroll-button a").appear(function(d){d.preventDefault();var e=a(".edgtf-blog-infinite-scroll-button a"),f=e.attr("href"),g=".edgtf-masonry-pagination-infinite-scroll",h=".edgtf-blog-infinite-scroll-button a",i=a(h).attr("href");e.css("visibility","visible"),e.text(edgtfGlobalVars.vars.edgtfMessage),a.get(f+"",function(d){var f=a(g,d).wrapInner("").html();i=a(h,d).attr("href"),b.append(f).waitForImages(function(){edgtf.modules.blog.edgtfInitAudioPlayer(),edgtf.modules.common.edgtfSlickSlider(),edgtf.modules.common.edgtfFluidVideo(),setTimeout(function(){b.isotope("reloadItems").isotope({sortBy:"original-order"}),a(".edgtf-masonry-pagination-load-more").isotope("layout")},200)}),e.parent().data("rel")>c?(e.attr("href",i),e.css("visibility","hidden")):(e.text(edgtfGlobalVars.vars.edgtfFinishedMessage),setTimeout(function(){e.parent().fadeOut(600,function(){e.parent().remove()})},600))}),c++},{one:!1,accX:0,accY:edgtfGlobalVars.vars.edgtfElementAppearAmount})}else if(b.hasClass("edgtf-masonry-pagination-load-more")){var c=1;a(".edgtf-blog-load-more-button a").on("click",function(d){d.preventDefault();var e=a(this),f=e.attr("href"),g=".edgtf-masonry-pagination-load-more",h=".edgtf-blog-load-more-button a",i=a(h).attr("href");a.get(f+"",function(d){var f=a(g,d).wrapInner("").html();i=a(h,d).attr("href"),b.append(f).isotope("reloadItems").isotope({sortBy:"original-order"}),edgtf.modules.blog.edgtfInitAudioPlayer(),edgtf.modules.common.edgtfSlickSlider(),edgtf.modules.common.edgtfFluidVideo(),setTimeout(function(){a(".edgtf-masonry-pagination-load-more").isotope("layout")},400),e.parent().data("rel")>c?e.attr("href",i):e.parent().remove()}),c++})}}}function i(){var b=a(".edgtf-blog-holder.edgtf-blog-load-more:not(.edgtf-blog-type-masonry)");b.length&&b.each(function(){var b,c,d=a(this),e=d.find(".edgtf-load-more-ajax-pagination .edgtf-btn");c=d.data("max-pages"),e.on("click",function(f){f.preventDefault(),f.stopPropagation();var g=j(d);if(b=g.nextPage,b<=c){var h=k(g);a.ajax({type:"POST",data:h,url:EdgefAjaxUrl,success:function(c){b++,d.data("next-page",b);var e=a.parseJSON(c),f=e.html;d.waitForImages(function(){d.find("article:last").after(f),setTimeout(function(){edgtf.modules.blog.edgtfInitAudioPlayer(),edgtf.modules.common.edgtfOwlSlider(),edgtf.modules.common.edgtfFluidVideo()},400)})}})}b===c&&e.hide()})})}function j(a){var b={};return b.nextPage="",b.number="",b.category="",b.blogType="",b.archiveCategory="",b.archiveAuthor="",b.archiveTag="",b.archiveDay="",b.archiveMonth="",b.archiveYear="","undefined"!=typeof a.data("next-page")&&a.data("next-page")!==!1&&(b.nextPage=a.data("next-page")),"undefined"!=typeof a.data("post-number")&&a.data("post-number")!==!1&&(b.number=a.data("post-number")),"undefined"!=typeof a.data("category")&&a.data("category")!==!1&&(b.category=a.data("category")),"undefined"!=typeof a.data("blog-type")&&a.data("blog-type")!==!1&&(b.blogType=a.data("blog-type")),"undefined"!=typeof a.data("archive-category")&&a.data("archive-category")!==!1&&(b.archiveCategory=a.data("archive-category")),"undefined"!=typeof a.data("archive-author")&&a.data("archive-author")!==!1&&(b.archiveAuthor=a.data("archive-author")),"undefined"!=typeof a.data("archive-tag")&&a.data("archive-tag")!==!1&&(b.archiveTag=a.data("archive-tag")),"undefined"!=typeof a.data("archive-day")&&a.data("archive-day")!==!1&&(b.archiveDay=a.data("archive-day")),"undefined"!=typeof a.data("archive-month")&&a.data("archive-month")!==!1&&(b.archiveMonth=a.data("archive-month")),"undefined"!=typeof a.data("archive-year")&&a.data("archive-year")!==!1&&(b.archiveYear=a.data("archive-year")),b}function k(a){var b={action:"freestyle_edge_blog_load_more",nextPage:a.nextPage,number:a.number,category:a.category,blogType:a.blogType,archiveCategory:a.archiveCategory,archiveAuthor:a.archiveAuthor,archiveTag:a.archiveTag,archiveDay:a.archiveDay,archiveMonth:a.archiveMonth,archiveYear:a.archiveYear};return b}var l={};edgtf.modules.blog=l,l.edgtfInitAudioPlayer=f,l.edgtfOnDocumentReady=b,l.edgtfOnWindowLoad=c,l.edgtfOnWindowResize=d,l.edgtfOnWindowScroll=e,a(document).ready(b),a(window).load(c),a(window).resize(d),a(window).scroll(e)}(jQuery);