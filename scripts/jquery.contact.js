jQuery(document).ready(function(){$("#message").hide(),$("#contact input[type=text], #contact input[type=email], #contact select, #contact textarea").each(function(){$(this).after('<mark class="validate"></mark>')}),$("#comments").focusout(function(){$(this).val()?$(this).removeClass("error").parent().find("mark").removeClass("error").addClass("valid"):$(this).addClass("error").parent().find("mark").removeClass("valid").addClass("error")}),$("#email").focusout(function(){var a;$(this).val()&&(a=$(this).val(),new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i).test(a))?$(this).removeClass("error").parent().find("mark").removeClass("error").addClass("valid"):$(this).addClass("error").parent().find("mark").removeClass("valid").addClass("error")}),$("#submit").click(function(){$("#message").slideUp(200,function(){$("#message").hide(),$("#email").triggerHandler("focusout"),$("#comments").triggerHandler("focusout")})}),$("#contactform").submit(function(){if($("#contact mark.error").size()>0)return!1;var a=$(this).attr("action");return $("#submit").after('<img src="images/ajax-loader.gif" class="loader" />').attr("disabled","disabled"),$.post(a,$("#contactform").serialize(),function(a){$("#message").html(a),$("#message").slideDown(),$("#contactform img.loader").fadeOut("slow",function(){$(this).remove()}),$("#contactform #submit").removeAttr("disabled"),null!=a.match("success")&&$("#contactform #submit").attr("disabled",!0)}),!1})});