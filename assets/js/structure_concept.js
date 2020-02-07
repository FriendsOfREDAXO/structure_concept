function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};

var website = {

	init: function()
    {
		// this.setDrag();
        this.initContentBuilder();
	},

	initContentBuilder: function()
    {
        $("#contentarea").keditor({
            debug:false,
            snippetsUrl:"/assets/addons/structure_concept/html/snippets.html",
            onComponentChanged: function (event, changedComponent, contentArea) {
                
                $(changedComponent).find('.rex-value').each(function(){
                    var _value = $(this).data('value');
                    var _slice = $(this).data('slice');
                    var _data = $(this).text(); 
                    
                    $.ajax({
                        url: "index.php?rex-api-call=structureConcept&func=update&rex-value="+_value+"&rex-slice="+_slice+"&data="+_data,
                        context: document.body
                    }).done(function() {
                        
                    });
                });
            },
            onComponentSnippetDropped: function (event, newComponent, droppedSnippet, contentArea) {
                
                var module_id = $(newComponent).data('module');
                // var article_id = $(newComponent).data('article');
                var article_id = 1;
                
                $.ajax({
                    url: "index.php?rex-api-call=structureConcept&func=create&module_id="+module_id+"&article_id="+article_id,
                    context: document.body
                }).done(function(data) {
                    
                    var _data = data;
                    
                    $(".rex-value[data-slice='REX_SLICE_ID']").each(function(){
                        $(this).attr('data-slice',$(this).data('slice'));
                    });
                });
            },
         });
    },
    
	// initContentBuilder: function()
    // {
        // var setContent = debounce(function() {
            // $(".rex-value").each(function(){
                
                // var _value = $(this).data('value');
                // var _slice = $(this).data('slice');
                // var _data = $(this).text();
                
                // $.ajax({
                    // url: "index.php?rex-api-call=structureConcept&rex-value="+_value+"&rex-slice="+_slice+"&data="+_data,
                    // context: document.body
                // }).done(function() {
                    // alert('done')
                // });
            // });
        // }, 250);
        
        // $('#contentarea').on('input',setContent);
    // }

    // setDrag: function()
    // {
		// dragula([document.querySelector('.structure-modules'), document.querySelector('.structure-content')],{
			// copy: true
		// })		
		// .on('dragend', function (el) {
			// _moduleId = el.getAttribute('data-module');
			// _markup = document.querySelector('.structure-markups [data-module="'+_moduleId+'"]').innerHTML;
			// el.innerHTML = _markup;
		// });
	// },

};

$(document).ready(function() {
	website.init();
});
