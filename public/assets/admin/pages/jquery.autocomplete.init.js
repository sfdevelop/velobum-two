/**
* Theme: Adminox Dashboard
* Author: Coderthemes
* Auto Complete
*/


/*jslint  browser: true, white: true, plusplus: true */
/*global $, countries */

$(function(){"use strict"
var e=$.map(countries,function(e,a){return{value:e,data:a}})
$.mockjax({url:"*",responseTime:2e3,response:function(a){var o=a.data.query,t=o.toLowerCase(),n=RegExp("\\b"+$.Autocomplete.utils.escapeRegExChars(t),"gi"),s=$.grep(e,function(e){return n.test(e.value)}),r={query:o,suggestions:s}
this.responseText=JSON.stringify(r)}}),$("#autocomplete-ajax").autocomplete({lookup:e,lookupFilter:function(e,a,o){var t=RegExp("\\b"+$.Autocomplete.utils.escapeRegExChars(o),"gi")
return t.test(e.value)},onSelect:function(e){$("#selction-ajax").html("You selected: "+e.value+", "+e.data)},onHint:function(e){$("#autocomplete-ajax-x").val(e)},onInvalidateSelection:function(){$("#selction-ajax").html("You selected: none")}})
var a=["Anaheim Ducks","Atlanta Thrashers","Boston Bruins","Buffalo Sabres","Calgary Flames","Carolina Hurricanes","Chicago Blackhawks","Colorado Avalanche","Columbus Blue Jackets","Dallas Stars","Detroit Red Wings","Edmonton OIlers","Florida Panthers","Los Angeles Kings","Minnesota Wild","Montreal Canadiens","Nashville Predators","New Jersey Devils","New Rork Islanders","New York Rangers","Ottawa Senators","Philadelphia Flyers","Phoenix Coyotes","Pittsburgh Penguins","Saint Louis Blues","San Jose Sharks","Tampa Bay Lightning","Toronto Maple Leafs","Vancouver Canucks","Washington Capitals"],o=["Atlanta Hawks","Boston Celtics","Charlotte Bobcats","Chicago Bulls","Cleveland Cavaliers","Dallas Mavericks","Denver Nuggets","Detroit Pistons","Golden State Warriors","Houston Rockets","Indiana Pacers","LA Clippers","LA Lakers","Memphis Grizzlies","Miami Heat","Milwaukee Bucks","Minnesota Timberwolves","New Jersey Nets","New Orleans Hornets","New York Knicks","Oklahoma City Thunder","Orlando Magic","Philadelphia Sixers","Phoenix Suns","Portland Trail Blazers","Sacramento Kings","San Antonio Spurs","Toronto Raptors","Utah Jazz","Washington Wizards"],t=$.map(a,function(e){return{value:e,data:{category:"NHL"}}}),n=$.map(o,function(e){return{value:e,data:{category:"NBA"}}}),s=t.concat(n)
$("#autocomplete").devbridgeAutocomplete({lookup:s,minChars:1,onSelect:function(e){$("#selection").html("You selected: "+e.value+", "+e.data.category)},showNoSuggestionNotice:!0,noSuggestionNotice:"Sorry, no matching results",groupBy:"category"}),$("#autocomplete-custom-append").autocomplete({lookup:e,appendTo:"#suggestions-container"}),$("#autocomplete-dynamic").autocomplete({lookup:e})})
