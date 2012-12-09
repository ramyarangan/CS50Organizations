/**
 * MODIFIED BY MICHELLE DENG 12/09/2012.
 * 
 * Extensions: 
 * - Set select title
 * - Create dividers
 * - Minor spacing tweaks in list elements 
 * - Scrollbar & max length of dropdown
 *
 * 
 * ORIGINAL BY DAVID STUTZ.
 *
 * bootstrap-multiselect.js 1.0.0
 * https://github.com/davidstutz/bootstrap-multiselect
 * 
 * Copyright 2012 David Stutz 
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
!function ($) {

	"use strict"; // jshint ;_;

	var Multiselect = function(element, txt, options) {
		// Default options:
		var defaults = {
			button: 'btn',
			width: 'auto',
			// Default text function will either print 'None selected' in case no option is selected,
			// or a list of the selected options up to a length of 3 selected options.
			// If more than 3 options are selected, the number of selected options is printed.
			text: function(options) {
			return txt;
				if (options.length == 0) {
					return 'Select below';
				}
				else {
					return options.length + ' selected';
				}/*
				else {
					var selected = '';
					options.each(function() {
						selected += $(this).text() + ', ';
					});
					return selected.substr(0, selected.length -2);
				}*/
			},
			container: '<div class="btn-group" />',
		};
		
		options = $.extend(defaults, options);
		
		var select = element,
			// Create the button with given classes and the inital text.
			button = $('<button style="width:' + options.width + '" class="dropdown-toggle ' + options.button + '" data-toggle="dropdown">' + options.text($('option:selected', select)) + ' <b class="caret"></b></button>')
				.dropdown(),
			// The ul will hold all options and present the dropdown.
			ul = $('<ul class="dropdown-menu" style="text-align:left; max-height:250px; overflow-y:auto; overflow-x:hidden"></ul>'),
			container = $(options.container)
				.append(button)
				.append(ul);
		
		// Manually add the multiple attribute, if its not already set.
		if (!$(select).attr('multiple')) {
			$(select).attr('multiple', true);
		}
		
		// Build the dropdown.
		$('option', select).each(function() {
		    if ($(this).hasClass("divider"))
		    {
		    	$(ul).append('<li class="divider"></li>');
		    }
		    else if ($(this).hasClass("title"))
		    {
		        $(ul).append('<li class=\"nav-header\">'+$(this).val()+'</li>');
		    }/*
		    else if ($(this).hasClass("check-all"))
		    {
		        if ($(this).is(':selected')) {
				    $(this).attr('selected', true);
			    }
			    
		        $(ul).append('<li><a href="#"><label class="checkbox"><input type="checkbox" class="all" value="' + $(this).val() + '"> &nbsp;&nbsp;&nbsp; ' + $(this).text() + '</label></a></li>');
		        
		        var selected = $(this).attr('selected') || false,
			    	checkbox = $('li input[value="' + $(this).val() + '"]', ul);
		    
		        checkbox.attr('checked', selected);
		        
		        if (selected) {
		            $('#head').after("hi");
				    checkbox.parents('li').addClass('active');
				    (checkbox.parents('li')).siblings().addClass('active');
				    checkbox.parents('li').siblings('li').children('li input.reg').attr('checked', selected);
			    }
		    }*/
		    else
		    {
			    if ($(this).is(':selected')) {
				    $(this).attr('selected', true);
			    }
			
			    $(ul).append('<li><a href="#"><label class="checkbox"><input type="checkbox" class="reg" value="' + $(this).val() + '"> &nbsp;&nbsp;&nbsp;' + $(this).text() + '</label></a></li>');
			    var selected = $(this).attr('selected') || false,
			    	checkbox = $('li input[value="' + $(this).val() + '"]', ul);
				
		    	checkbox.attr('checked', selected);
			
			    if (selected) {
				    checkbox.parents('li').addClass('active');
			    }
			}
		});
		
		$(select).hide()
			.after(container);
		
		$('li label', ul).css({'cursor': 'pointer'});
		
		// Bind the change event on the dropdown elements.
		$('li input[type="checkbox"]', ul).on('change', function(event) {
		
		
		
			var checked = $(this).attr('checked') || false;
			/*
			if ($(this).hasClass("all"))
			{
			    $(this).parents('li').addClass('active');
                $(this).parents('li').siblings().addClass('active');
                
                $('option[value="' + $(this).val() + '"]', select).attr('selected', checked);
			    $('option[value="' + $(this).val() + '"]', select).siblings().attr('selected', checked);
			}
			
			else{*/
			
			if (checked) {
				$(this).parents('li').addClass('active');
			}
			else {
				$(this).parents('li').removeClass('active');
			}
			
			$('option[value="' + $(this).val() + '"]', select).attr('selected', checked);
			
			
			$(button).html(options.text($('option:selected', select)) + ' <b class="caret"></b>');
		});
		
		$('li a', ul).on('click', function(event) {
			event.stopImmediatePropagation();
		});
	};

	$.fn.multiselect = function (txt, options) {
		return this.each(function () {
			var data = $(this).data('multiselect');
		
			if (!data) {
				$(this).data('multiselect', (data = new Multiselect(this, txt, options)));
			}
		});
	}

	Multiselect.prototype.constructor = Multiselect;

}(window.jQuery);
