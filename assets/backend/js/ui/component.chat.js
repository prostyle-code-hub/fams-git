!function(s){"use strict";var t=function(){this.$body=s("body"),this.$chatInput=s(".chat-input"),this.$chatList=s(".conversation-list"),this.$chatSendBtn=s(".chat-send"),this.$chatForm=s("#chat-form")};t.prototype.save=function(){var t=this.$chatInput.val(),i=moment().format("h:mm");return""==t?(this.$chatInput.focus(),!1):(s('<li class="clearfix odd"><div class="chat-avatar"><img src="assets/images/users/avatar-1.jpg" alt="male"><i>'+i+'</i></div><div class="conversation-text"><div class="ctext-wrap"><i>Dominic</i><p>'+t+"</p></div></div></li>").appendTo(".conversation-list"),this.$chatInput.focus(),this.$chatList.animate({scrollTop:this.$chatList.prop("scrollHeight")},1e3),!0)},t.prototype.init=function(){var i=this;i.$chatInput.keypress(function(t){if(13==t.which)return i.save(),!1}),i.$chatForm.on("submit",function(t){return t.preventDefault(),i.save(),!1})},s.ChatApp=new t,s.ChatApp.Constructor=t}(window.jQuery),function(t){"use strict";window.jQuery.ChatApp.init()}();